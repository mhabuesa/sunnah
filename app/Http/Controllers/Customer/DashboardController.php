<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('frontend.customer.dashboard');
    }
    
    public function orders()
    {
        $auth = auth()->guard('customer')->user();

        $orders = Order::where('customer_id', $auth->id)
            ->with([
                'orderDetails.product'
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.customer.order', compact('orders'));
    }
}