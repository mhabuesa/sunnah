<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Services\SmsService;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SmsCampaignController extends Controller
{
    public function index()
    {
        return view('backend.sms.index');
    }

    public function getCustomerCount(Request $request)
    {
        $selection = $request->input('customer_selection', 'all');
        $filter = $request->input('filter_customer', 'all');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = Customer::query();

        // ১. কাস্টমার রেজিস্ট্রেশন ডেট অনুযায়ী ফিল্টার
        if ($selection !== 'all') {
            switch ($selection) {
                case 'week':
                    $query->where('created_at', '>=', now()->subWeek());
                    break;
                case '15days':
                    $query->where('created_at', '>=', now()->subDays(15));
                    break;
                case 'month':
                    $query->where('created_at', '>=', now()->subMonth());
                    break;
                case 'custom':
                    if ($startDate && $endDate) {
                        try {
                            // JavaScript থেকে আসা mm/dd/yyyy ফরম্যাটকে ডাটাবেজ ফরম্যাটে রূপান্তর
                            $start = Carbon::createFromFormat('m/d/Y', $startDate)->startOfDay();
                            $end = Carbon::createFromFormat('m/d/Y', $endDate)->endOfDay();
                            $query->whereBetween('created_at', [$start, $end]);
                        } catch (\Exception $e) {
                            // ডেট ফরম্যাট ভুল হলে কুয়েরি স্কিপ করবে
                        }
                    }
                    break;
            }
        }

        // ২. অর্ডার স্ট্যাটাস অনুযায়ী ফিল্টার
        if ($filter !== 'all') {
            if ($filter === 'ordered') {
                $query->whereHas('orders');
            } elseif ($filter === 'not_ordered') {
                $query->whereDoesntHave('orders');
            }
        }

        // মোট কাস্টমার সংখ্যা বের করা
        $totalCustomers = $query->count();

        // ৩. SMS ব্যালেন্স চেক (এটি শুধুমাত্র প্রথমবার বা প্রয়োজনীয় ক্ষেত্রে কল হবে)
        $availableSms = 0;
        try {
            $smsService = new SmsService();
            $balanceData = $smsService->getBalance();

            // আপনার API রেসপন্স অনুযায়ী 'balance' কি চেক করে নিন
            // এখানে ধরা হয়েছে প্রতি SMS ০.৩৫ টাকা
            if (isset($balanceData['balance'])) {
                $availableSms = (int) floor($balanceData['balance'] / 0.35);
            }
        } catch (\Exception $e) {
            $availableSms = 0; // সার্ভিস ডাউন থাকলে ০ দেখাবে
        }

        return response()->json([
            'total_customers' => $totalCustomers,
            'available_sms'   => $availableSms,
        ]);
    }

    public function send(Request $request)
    {

        $request->validate([
            'message_body' => 'required',
        ]);

        $customerSelection = $request->customer_selection ?? 'all';
        $filter = $request->filter_customer ?? 'all';

        // কাস্টমার query
        $query = Customer::query();

        if ($customerSelection != 'all') {
            switch ($customerSelection) {
                case 'week':
                    $query->where('created_at', '>=', now()->subWeek());
                    break;
                case '15days':
                    $query->where('created_at', '>=', now()->subDays(15));
                    break;
                case 'month':
                    $query->where('created_at', '>=', now()->subMonth());
                    break;
                case 'custom':
                    if ($customerSelection === 'custom' && $request->start_date && $request->end_date) {
                        $start = Carbon::createFromFormat('m/d/Y', $request->start_date)->startOfDay();
                        $end = Carbon::createFromFormat('m/d/Y', $request->end_date)->endOfDay();
                        $query->whereBetween('created_at', [$start, $end]);
                    }
                    break;
            }
        }

        if ($filter != 'all') {
            if ($filter == 'ordered') {
                $query->whereHas('orders');
            } elseif ($filter == 'not_ordered') {
                $query->whereDoesntHave('orders');
            }
        }

        // সমস্ত ফোন নম্বর কমা দিয়ে আলাদা করে একটি স্ট্রিং হিসেবে
        $number = $query->pluck('phone')->implode(',');


        if ($number) {
            $smsService = new SmsService();
            $data = [
                'number' => $number,
                'message' => $request->message_body,
            ];
            $smsService->sendMessage($data); // Service method
        }

        return back()->with('success', 'SMS queued successfully!');
    }
}