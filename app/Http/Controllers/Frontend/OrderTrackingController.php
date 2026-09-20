<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderTrackingController extends Controller
{

    public function tracking(Request $request)
    {
        $order = null;
        $searched = false;

        if ($request->filled('order_number')) {
            $searched = true;

            $order = Order::with([
                'orderDetails.product',
                'orderDetails.variation',
            ])
                ->where('invoice_no', $request->order_number)
                ->first();
        }

        return view('frontend.order.tracking', compact(
            'order',
            'searched'
        ));
    }
}