<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CharityCategory;
use App\Models\CharityContent;
use App\Models\CharitySubcategory;
use App\Models\Donation;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Raziul\Sslcommerz\Facades\Sslcommerz;

class CharityController extends Controller
{
    public function index()
    {
        $charityCategories = CharityCategory::where('status', '1')->orderBy('priority', 'asc')->get();
        return view('frontend.charity.index', compact([
            'charityCategories',
        ]));
    }

    public function charity_details($slug)
    {
        $category = CharityCategory::where('slug', $slug)->first();
        $subcategories = CharitySubcategory::where('category_id', $category->id)->orderBy('priority', 'asc')->get();
        $contents = CharityContent::where('category_id', $category->id)->where('status', '1')->orderBy('priority', 'asc')->get();
        return view('frontend.charity.details', compact([
            'category',
            'subcategories',
            'contents',
        ]));
    }

    public function zakatCalculator()
    {
        return view('frontend.charity.zakatCalculator');
    }

        /**
     * Initiate Charity Donation Payment.
     */
    public function charity_store(Request $request)
    {
        $validated = $request->validate([
            'donations' => 'required|array|min:1',
            'donations.*.subcategory_id' => 'required|integer|distinct',
            'donations.*.amount' => 'required|integer|min:1',
            'note' => 'nullable|string|max:1000',
        ]);

        // Remove empty donation amounts.
        $items = collect($validated['donations'])
            ->filter(fn($item) => (int) $item['amount'] > 0);

        if ($items->isEmpty()) {
            throw ValidationException::withMessages([
                'donations' => 'Please enter a valid donation amount.',
            ]);
        }

        // Prepare donation purpose and calculate total amount.
        $purpose = [];
        $totalAmount = 0;

        foreach ($items as $item) {
            $purpose[] = [
                'subcategory_id' => (int) $item['subcategory_id'],
                'amount' => (int) $item['amount'],
            ];

            $totalAmount += (int) $item['amount'];
        }

        // Create pending donation record.
        $donation = Donation::create([
            'donation_no' => Donation::generateDonationNumber(),
            'purpose' => $purpose,
            'donor_name' => $request->name ?? 'Anonymous',
            'donor_phone' => $request->phone ?? '01700000000',
            'amount' => $totalAmount,
            'payment_method' => 'sslcommerz',
            'payment_status' => 'pending',
        ]);

        $transaction = Transaction::create([
            'transaction_id' => Transaction::generateTransactionID(),
            'payment_type' => 'charity',
            'payable_id' => $donation->id,
            'amount' => $totalAmount,
            'status' => 'pending',
        ]);

        try {
            // Initiate SSLCommerz payment.
            $response = Sslcommerz::setOrder(
                $totalAmount,
                $transaction->transaction_id,
                'Charity Donation #' . $transaction->transaction_id
            )
                ->setCustomer(
                    $donation->donor_name,
                    $donation->donor_email ?? 'donation@sunnahatoz.com',
                    $donation->donor_phone,
                    'Dhaka, Bangladesh'
                )
                ->makePayment();

            if ($response->success()) {
                return redirect()->away($response->gatewayPageURL());
            }

            $donation->update([
                'payment_status' => 'failed',
            ]);

            return back()->with(
                'error',
                'Unable to initiate payment. Please try again.'
            );
        } catch (\Throwable $e) {
            report($e);

            $donation->update([
                'payment_status' => 'failed',
            ]);

            return back()->with(
                'error',
                'Something went wrong while processing your payment.'
            );
        }
    }
}