<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Jobs\OrderConfirmationJob;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Transaction;
use App\Services\CartService;
use App\Services\OrderStockService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Raziul\Sslcommerz\Facades\Sslcommerz;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        // Get cart data first
        $cartData = CartService::get();

        // Prevent order if cart is empty
        if (empty($cartData)) {
            return redirect()
                ->back()
                ->with('error', 'Your cart is empty. Please add a product before placing an order.');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        // Get existing customer or create new customer by phone
        $customer = Customer::where('phone', $request->phone)->first();

        if (!$customer) {
            $customer = Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
            ]);
        }

        $invoiceNumber = Order::generateInvoiceNumber();

        // Create Order
        $order = Order::create([
            'invoice_no' => $invoiceNumber,
            'customer_id' => $customer->id,
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

        $grand_total = null;

        foreach ($cartData as $item) {

            $productId = $item['product_id'];
            $variationId = $item['variation_id'];
            $qty = $item['qty'];

            // Fetch Product
            $product = Product::find($productId);

            if (!$product) {
                continue;
            }

            $price = $product->price;
            $variantName = null;

            // Fetch Variation if exists
            if ($variationId) {

                $variation = ProductVariation::with([
                    'attribute',
                    'attributeValue'
                ])->find($variationId);

                if ($variation) {


                    $price = $variation->price;

                    $variantName = $variation->attribute->name . ' - ' .
                        $variation->attributeValue->value;

                    // ==========================================
                    // Minus variation stock according to order qty
                    // ==========================================
                    $variation->decrement('stock', $qty);
                    OrderStockService::specialDeal($productId, $qty);
                }
            } else {

                // ==========================================
                // Minus product stock according to order qty
                // ==========================================
                $product->decrement('stock', $qty);
                OrderStockService::specialDeal($productId, $qty);
            }

            $totalPrice = $price * $qty;

            // Insert into OrderDetails
            OrderDetails::create([
                'order_id'     => $order->id,
                'product_id'   => $productId,
                'variation_id' => $variationId,
                'variant'      => $variantName,
                'qty'          => $qty,
                'price'        => $price,
                'total'        => $totalPrice,
            ]);

            $grand_total += $totalPrice;
        }

        $grand_total = $grand_total - ($request->coupon_discount ?? 0) + ($request->shipping_charge ?? 0);

        $order->update([
            'total' => $grand_total,
        ]);

        // Handling Cash on Delivery (COD)
        if ($request->payment_method == 'cod') {
            // Clear cart after successful order
            CartService::clear();

            $data = [
                'order_id' => $order->id,
                'phone' => $customer->phone,
            ];

            OrderConfirmationJob::dispatch($data)->delay(5);

            return view('frontend.order.order_placed', compact('order'));
        }

        // Payment processing for SSLCommerz
        if ($request->payment_method == 'sslcommerz') {

            $transaction = Transaction::create([
                'transaction_id' => Transaction::generateTransactionID(),
                'payment_type' => 'product',
                'payable_id' => $order->id,
                'amount' => $grand_total,
                'status' => 'pending',
            ]);

            try {
                // Initiate SSLCommerz payment.
                $response = Sslcommerz::setOrder(
                    $request->grand_total,
                    $transaction->transaction_id,
                    'Product Order #' . $transaction->transaction_id
                )
                    ->setCustomer(
                        $customer->name,
                        $customer->email ?? 'donation@sunnahatoz.com',
                        $customer->phone,
                        'Dhaka, Bangladesh'
                    )
                    ->makePayment();

                if ($response->success()) {
                    return redirect()->away($response->gatewayPageURL());
                }

                // If payment initiation fails, restore stock
                OrderStockService::restore($order);
                OrderStockService::specialDealRestore($order);

                $order->update([
                    'payment_status' => 'failed',
                ]);

                return back()->with(
                    'error',
                    'Unable to initiate payment. Please try again.'
                );
            } catch (\Throwable $e) {
                report($e);

                // If any exception occurs during payment gateway communication, restore stock
                OrderStockService::restore($order);
                OrderStockService::specialDealRestore($order);

                $order->update([
                    'payment_status' => 'failed',
                ]);

                return back()->with(
                    'error',
                    'Something went wrong while processing your payment.'
                );
            }
        }
    }
}