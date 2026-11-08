<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Donation;
use App\Models\Transaction;
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

        if ($transaction->status === 'paid') {
            return redirect('/')->with(
                'success',
                'Payment has already been completed.'
            );
        }

        // dd($transaction, $request->all());

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

        $transaction->update([
            'status' => 'paid',
            'gateway_transaction_id' => $request->val_id,
            'bank_transaction_id' => $request->bank_tran_id,
            'gateway_response' => $request->all(),
            'paid_at' => now(),
        ]);
        Donation::where('id', $transaction->payable_id)->update([
            'payment_status' => 'paid',
            'transaction_ref' => $transaction->transaction_id,
        ]);

        // dd($data);
        return redirect()->route('charity.index')->with('success', 'Thank you! Your donation has been received successfully.');
    }


    /**
     * Handle failed payment callback.
     */
    public function failure(Request $request)
    {
        $transaction = Transaction::where(
            'transaction_id',
            $request->input('tran_id')
        )->first();

         $transaction->update([
            'status' => 'failed',
        ]);
        Donation::where('id', $transaction->payable_id)->update([
            'payment_status' => 'failed',
        ]);


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


        $transaction = Transaction::where(
            'transaction_id',
            $request->input('tran_id')
        )->first();

         $transaction->update([
            'status' => 'cancelled',
        ]);
        Donation::where('id', $transaction->payable_id)->update([
            'payment_status' => 'cancelled',
        ]);


        return redirect('/')->with(
            'error',
            'Your payment was unsuccessful.'
        );
    }


    /**
     * Handle SSLCommerz IPN.
     */
    public function ipn(Request $request)
    {
        // Verify SSLCommerz response hash.
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
            ], 400);
        }

        // Server-side payment validation.
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

        if ($transaction->payment_type === 'charity') {
            $processed = DB::transaction(function () use ($transaction, $request) {
                $transaction->update([
                    'status' => 'paid',
                    'gateway_transaction_id' => $request->val_id,
                    'bank_transaction_id' => $request->bank_tran_id,
                    'gateway_response' => $request->all(),
                    'paid_at' => now(),
                ]);

                Donation::where('id', $transaction->payable_id)->update([
                    'payment_status' => 'paid',
                    'transaction_ref' => $transaction->transaction_id,
                ]);

                return true;
            });
        } else {
            $processed = DB::transaction(function () use ($transaction, $request) {
                $transaction->update([
                    'status' => 'paid',
                    'gateway_transaction_id' => $request->val_id,
                    'bank_transaction_id' => $request->bank_tran_id,
                    'gateway_response' => $request->all(),
                    'paid_at' => now(),
                ]);

                Order::where('id', $transaction->payable_id)->update([
                    'payment_status' => 'paid',
                    'transaction_ref' => $transaction->transaction_id,
                ]);

                return true;
            });
        }

        if (!$processed) {
            return response()->json([
                'message' => 'Unable to process transaction.',
            ], 500);
        }

        return response()->json([
            'message' => 'Payment verified successfully.',
        ]);
    }
}