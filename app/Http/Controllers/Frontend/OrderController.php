<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Jobs\OrderConfirmationJob;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Services\CartService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        // dd($request->all());

        // ২. Customer login thakle sheta nawa, na thakle create kora phone diye
        $customer = Customer::where('phone', $request->phone)->first();
        if (!$customer) {
            $customer = Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone, // Phone number add kora baki chilo
            ]);
        }

        $invoiceNumber = Order::generateInvoiceNumber();

        // ৩. Order create logic
        $order = Order::create([
            'invoice_no' => $invoiceNumber,
            'customer_id' => $customer->id, // $request->customer_id er bodole $customer->id hobe
            'order_type' => 'web',
            'payment_method' => $request->payment_method,
            'payment_status' => 'unpaid',
            'coupon_code' => $request->coupon_code,
            'discount_amount' => $request->coupon_discount ?? 0,
            'shipping_address' => $request->address,
            'shipping_cost' => $request->shipping_charge ?? 0,
            'subtotal' => $request->subtotal,
            'total' => $request->grand_total,
        ]);

        $cartData = CartService::get();

        foreach ($cartData as $item) {
            $productId = $item['product_id'];
            $variationId = $item['variation_id'];
            $qty = $item['qty'];

            // Fetch Product Info
            $product = Product::find($productId);
            if (!$product) continue;

            $price = $product->price;
            $variantName = null;

            // Fetch Variation Info if exists
            if ($variationId) {
                $variation = ProductVariation::with(['attribute', 'attributeValue'])->find($variationId);
                if ($variation) {
                    $price = $variation->price; // Use variation price
                    $variantName = $variation->attribute->name . ' - ' . $variation->attributeValue->value;
                }
            }

            $totalPrice = $price * $qty;

            // 3. Insert into OrderDetails
            OrderDetails::create([
                'order_id'     => $order->id,
                'product_id'   => $productId,
                'variation_id' => $variationId,
                'variant'      => $variantName,
                'qty'          => $qty,
                'price'        => $price,
                'total'        => $totalPrice,
            ]);
        }

        // 4. Clear the cart session after successful order
        // CartService::clear();

        $data = [
            'order_id' => $order->id,
            'phone' => $customer->phone,
        ];
        
        OrderConfirmationJob::dispatch($data)->delay(5);

        return redirect()->back()->with('success', 'Order placed successfully!');
    }

    // private function generateInvoiceNumber()
    // {
    //     $today = date('ymd');
    //     $lastOrder = Order::where('invoice_no', 'like', 'INV-' . $today . '-%')
    //         ->latest()
    //         ->first();

    //     if ($lastOrder) {
    //         $lastNumber = (int) substr($lastOrder->invoice_no, strrpos($lastOrder->invoice_no, '-') + 1);
    //         $newNumber = $lastNumber + 1;
    //     } else {
    //         $newNumber = 1;
    //     }

    //     return 'INV-' . $today . '-' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);
    // }
}