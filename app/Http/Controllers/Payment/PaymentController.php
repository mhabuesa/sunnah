<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Jobs\OrderConfirmationJob;
use App\Models\Order;
use App\Models\Donation;
use App\Models\Customer;
use App\Models\Transaction;
use App\Services\CartService;
use App\Services\OrderStockService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Raziul\Sslcommerz\Facades\Sslcommerz;

class PaymentController extends Controller
{
    /**
     * Handle successful payment callback.
     */
    public function success(Request $request)
    {
        $transaction = Transaction::where(
            'transaction_id',
            $request->input('tran_id')
        )->first();

        if (!$transaction) {
            return redirect('/')->with('error', 'Transaction not found.');
        }

        // Validate payment with SSLCommerz.
        $isValid = Sslcommerz::validatePayment(
            $request->all(),
            $transaction->transaction_id,
            $transaction->amount
        );


        if (!$isValid) {
            return redirect('/')->with(
                'error',
                'Payment validation failed.'
            );
        }

        if ($transaction->status === 'paid') {

            if ($transaction->payment_type === 'product') {
                CartService::clear();
            }

            return redirect('/')->with(
                'success',
                'Payment has already been completed.'
            );
        }

        $processed = $this->markAsPaid(
            $transaction,
            $request->all()
        );


        if (!$processed) {
            return redirect('/')->with(
                'error',
                'Unable to process payment.'
            );
        }

        // Clear cart only after successful product payment.
        if ($transaction->payment_type === 'product') {
            CartService::clear();
        }

        return redirect('/')->with(
            'success',
            $transaction->payment_type === 'charity'
                ? 'Thank you! Your donation has been received successfully.'
                : 'Your order payment has been completed successfully.'
        );
    }


    /**
     * Handle failed payment callback.
     */
    public function failure(Request $request)
    {
        $updated = $this->updatePaymentStatus($request, 'failed');

        if (!$updated) {
            return redirect('/')->with(
                'error',
                'Unable to verify or update payment status.'
            );
        }

        return redirect('/')->with(
            'error',
            'Your payment was unsuccessful.'
        );
    }


    /**
     * Handle cancelled payment callback.
     */
    public function cancel(Request $request)
    {
        $updated = $this->updatePaymentStatus($request, 'canceled');

        if (!$updated) {
            return redirect('/')->with(
                'error',
                'Unable to verify or update payment status.'
            );
        }

        return redirect('/')->with(
            'error',
            'You cancelled the payment.'
        );
    }


    /**
     * Handle SSLCommerz IPN.
     */
    public function ipn(Request $request)
    {
        // Verify callback signature.
        if (!Sslcommerz::verifyHash($request->all())) {
            return response()->json([
                'message' => 'Invalid signature.',
            ], 400);
        }

        $transaction = Transaction::where(
            'transaction_id',
            $request->input('tran_id')
        )->first();

        if (!$transaction) {
            return response()->json([
                'message' => 'Transaction not found.',
            ], 404);
        }

        if ($transaction->status === 'paid') {
            return response()->json([
                'message' => 'Transaction already processed.',
            ]);
        }

        // Validate payment with SSLCommerz.
        $isValid = Sslcommerz::validatePayment(
            $request->all(),
            $transaction->transaction_id,
            $transaction->amount
        );

        if (!$isValid) {
            return response()->json([
                'message' => 'Payment validation failed.',
            ], 400);
        }

        $processed = $this->markAsPaid(
            $transaction,
            $request->all()
        );

        if (!$processed) {
            return response()->json([
                'message' => 'Unable to process transaction.',
            ], 500);
        }

        return response()->json([
            'message' => 'Payment verified successfully.',
        ]);
    }


    /**
     * Mark Product or Charity payment as paid.
     */
    private function markAsPaid(
        Transaction $transaction,
        array $data
    ): bool {

        return DB::transaction(function () use ($transaction, $data) {

            $transaction = Transaction::whereKey($transaction->transaction_id)
                ->lockForUpdate()
                ->first();
            if (!$transaction) {
                return false;
            }


            // Prevent duplicate payment processing.
            if ($transaction->status === 'paid') {
                return true;
            }

            if ($transaction->status !== 'pending') {
                return false;
            }

            // Find related payable record.
            if ($transaction->payment_type === 'product') {

                $payable = Order::whereKey($transaction->payable_id)
                    ->lockForUpdate()
                    ->first();
            } elseif ($transaction->payment_type === 'charity') {

                $payable = Donation::whereKey($transaction->payable_id)
                    ->lockForUpdate()
                    ->first();
            } else {
                return false;
            }

            if (!$payable || $payable->payment_status !== 'pending') {
                return false;
            }

            // Verify that the transaction amount matches the payable amount.
            if (
                round((float) $transaction->amount, 2)
                !== round((float) $payable->amount, 2)
                && $transaction->payment_type === 'charity'
            ) {
                return false;
            }

            if (
                $transaction->payment_type === 'product'
                && round((float) $transaction->amount, 2)
                !== round((float) $payable->total, 2)
            ) {
                return false;
            }

            // Update Order or Donation.
            $payable->update([
                'payment_status' => 'paid',
                'transaction_ref' => $data['bank_tran_id']
                    ?? $transaction->transaction_id,
                'paid_at' => now(),
            ]);

            // Update Transaction.
            $transaction->update([
                'status' => 'paid',
                'gateway_transaction_id' => $data['val_id'] ?? null,
                'bank_transaction_id' => $data['bank_tran_id'] ?? null,
                'gateway_response' => $data,
                'paid_at' => now(),
            ]);

            // Send order confirmation only for successful product payment.
            if ($transaction->payment_type === 'product') {

                $customer = Customer::find($payable->customer_id);

                if ($customer) {

                    OrderConfirmationJob::dispatch([
                        'order_id' => $payable->id,
                        'phone' => $customer->phone,
                    ])->delay(5)->afterCommit();
                }
            }

            return true;
        });
    }


    /**
     * Update failed or cancelled payment.
     */
    private function updatePaymentStatus(
        Request $request,
        string $status
    ): bool {

        // Verify callback hash before updating records.
        if (!Sslcommerz::verifyHash($request->all())) {
            return false;
        }

        return DB::transaction(function () use ($request, $status) {

            $transaction = Transaction::where(
                'transaction_id',
                $request->input('tran_id')
            )
                ->lockForUpdate()
                ->first();

            if (!$transaction || $transaction->status !== 'pending') {
                return false;
            }

            // Find related payable record.
            if ($transaction->payment_type === 'product') {

                $payable = Order::whereKey($transaction->payable_id)
                    ->lockForUpdate()
                    ->first();
            } elseif ($transaction->payment_type === 'charity') {

                $payable = Donation::whereKey($transaction->payable_id)
                    ->lockForUpdate()
                    ->first();
            } else {
                return false;
            }

            if (!$payable || $payable->payment_status === 'paid') {
                return false;
            }

            // Restore reserved product stock.
            if ($transaction->payment_type === 'product') {
                OrderStockService::restore($payable);
            }

            // Update Order or Donation.
            $payable->update([
                'payment_status' => $status,
            ]);

            // Update Transaction.
            $transaction->update([
                'status' => $status,
                'gateway_response' => $request->all(),
            ]);

            return true;
        });
    }
}