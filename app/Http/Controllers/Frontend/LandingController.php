<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Customer;
use App\Models\LandingProduct;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Services\SmsService;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function landing(string $slug)
    {
        $campaign = Campaign::where('campaign_url', $slug)->firstOrFail();
        $products = LandingProduct::whereIn('id', $campaign->product ?? [])->get();
        return view('frontend.landing.mango', compact('campaign', 'products'));
    }

    public function order(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'cart_data' => 'required|json'
        ]);

        $carts = json_decode($request->cart_data, true);
        $ids = collect($carts)->pluck('id');

        $products = LandingProduct::whereIn('id', $ids)->get()->keyBy('id');

        $total = collect($carts)->sum(function ($item) use ($products) {

            if (!isset($products[$item['id']])) return 0;

            return $products[$item['id']]->price * $item['qty'];
        });
        $invoiceNumber = Order::generateInvoiceNumber();


        $customer = Customer::where('phone', $request->phone)->first();
        if (!$customer) {
            $customer = Customer::create([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
            ]);
        }

        $order = Order::create([
            'invoice_no' => $invoiceNumber,
            'customer_id' => $customer->id,
            'order_type' => 'landing',
            'payment_method' => 'cod',
            'payment_status' => 'unpaid',
            'shipping_address' => $request->address,
            'shipping_cost' => 0,
            'subtotal' => $total,
            'total' => $total,
        ]);


        foreach ($carts as $item) {
            $productId = $item['id'];
            $qty = $item['qty'];

            // Fetch Product Info
            $product = $products[$productId] ?? null;
            if (!$product) continue;

            $price = $product->price;

            $totalPrice = $price * $qty;

            // 3. Insert into OrderDetails
            OrderDetails::create([
                'order_id'     => $order->id,
                'landing_product_id'   => $productId,
                'qty'          => $qty,
                'price'        => $price,
                'total'        => $totalPrice,
            ]);
        }


        $phone = $request->phone;

        $message = "প্রিয় গ্রাহক, " . $request->site_name . " থেকে আপনার অর্ডারটি সফলভাবে গ্রহণ করা হয়েছে। \nখুব শীঘ্রই আমাদের প্রতিনিধি আপনার সাথে যোগাযোগ করবে। ধন্যবাদ।";

        (new SmsService())->sendMessage([
            'number' => $phone,
            'message' => $message,
        ]);


        return redirect()->back()->with('success', 'অর্ডার সম্পন্ন হয়েছে');
    }
}