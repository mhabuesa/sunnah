<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PosController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name')->get();
        $carts = Cart::where('user_id', Auth::user()->id)->where('type', 'pos')->get();
        return view("backend.pos.index", [
            'categories' => $categories,
            'carts' => $carts,
        ]);
    }

    public function getProducts(Request $request)
    {
        $query = Product::select('id', 'name', 'sku', 'price', 'image', 'category_id', 'brand_id', 'description')->latest();

        // category filter
        if ($request->category && $request->category != 'all') {
            $query->where('category_id', $request->category);
        }

        // search
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('sku', 'like', '%' . $request->search . '%');
            });
        }

        $products = $query->paginate(16);

        return response()->json([
            'html' => view('backend.pos.product_card', compact('products'))->render(),
            'pagination' => (string) $products->appends($request->all())->links('pagination::bootstrap-5')
        ]);
    }


    public function addToCart(Request $request)
    {
        $userId = auth()->id();

        // variation check
        $cartQuery = Cart::where('user_id', $userId)
            ->where('product_id', $request->product_id);

        if ($request->variation_id) {
            $cartQuery->where('variation_id', $request->variation_id);
        } else {
            $cartQuery->whereNull('variation_id');
        }

        $cart = $cartQuery->first();

        // price determine
        $price = 0;

        if ($request->variation_id) {
            $variant = ProductVariation::find($request->variation_id);
            $price = $variant ? $variant->price : 0;
        } else {
            $product = Product::find($request->product_id);
            $price = $product ? $product->price : 0;
        }

        if ($cart) {
            $cart->qty += $request->qty;
        } else {
            $cart = new Cart();
            $cart->user_id = $userId;
            $cart->product_id = $request->product_id;
            $cart->variation_id = $request->variation_id;
            $cart->price = $price;
            $cart->qty = $request->qty;
            $cart->type = 'pos';
        }

        // ✅ ALWAYS update total_price
        $cart->total_price = $cart->qty * $cart->price;
        $cart->save();


        $carts = Cart::with('product', 'variation.attributeValue')
            ->where('user_id', Auth::user()->id)
            ->get();

        return response()->json([
            'success' => true,
            'carts' => $this->getCartData()
        ]);
    }


    public function updateCart(Request $request)
    {
        $cart = Cart::where('id', $request->id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $cart->qty = $request->qty;
        $cart->total_price = $cart->qty * $cart->price; // ✅ IMPORTANT
        $cart->save();

        return response()->json([
            'success' => true,
            'carts' => $this->getCartData()
        ]);
    }


    public function deleteCart(Request $request)
    {
        $cart = Cart::where('id', $request->id)
            ->where('user_id', auth()->id())
            ->first();

        if ($cart) {
            $cart->delete();
        }

        return response()->json([
            'success' => true,
            'carts' => $this->getCartData()
        ]);
    }

    private function getCartData()
    {
        return Cart::with(['product', 'variation.attributeValue'])
            ->where('user_id', Auth::user()->id)
            ->get()
            ->map(function ($cart) {
                return [
                    'id' => $cart->id,
                    'qty' => $cart->qty,
                    'price' => $cart->price,
                    'total_price' => $cart->total_price,

                    'product' => [
                        'name' => $cart->product->name,
                        'image' => $cart->product->image,
                    ],

                    'variation' => $cart->variation ? [
                        'attribute_value' => [
                            'value' => $cart->variation->attributeValue->value
                        ]
                    ] : null
                ];
            });
    }

    public function clearCart()
    {
        Cart::where('user_id', Auth::user()->id)->delete();

        return response()->json(['success' => true]);
    }


    public function scanBarcode(Request $request)
    {
        $sku = $request->sku;

        $product = null;
        $variation = null;

        // 🔍 Check Variation SKU
        $variation = ProductVariation::where('sku', $sku)->first();

        if ($variation) {
            $product = Product::find($variation->product_id);
            $price = $variation->price;
            $variation_id = $variation->id;
        } else {
            // 🔍 Check Product SKU
            $product = Product::where('sku', $sku)->first();

            if (!$product) {
                return response()->json([
                    'success' => false
                ]);
            }

            $price = $product->price;
            $variation_id = null;
        }

        // 🔥 CART CHECK (FIXED LOGIC)
        $cartQuery = Cart::where('user_id', auth()->id())
            ->where('product_id', $product->id);

        if ($variation_id) {
            $cartQuery->where('variation_id', $variation_id);
        } else {
            $cartQuery->whereNull('variation_id');
        }

        $cart = $cartQuery->first();

        if ($cart) {
            $cart->qty += 1;
            $cart->total_price = $cart->qty * $cart->price;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $product->id,
                'variation_id' => $variation_id,
                'qty' => 1,
                'price' => $price,
                'total_price' => $price,
                'type' => 'pos',
            ]);
        }

        // ✅ UPDATED CART RETURN
        $carts = Cart::with('product', 'variation.attributeValue')
            ->where('user_id', Auth::user()->id)
            ->get();

        return response()->json([
            'success' => true,
            'carts' => $carts
        ]);
    }

    public function orderStore(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
        ]);


        $customer = Customer::findOrFail($request->customer_id);
        $invoiceNumber = Order::generateInvoiceNumber();

        $order = Order::create([
            'invoice_no' => $invoiceNumber,
            'customer_id' =>  $request->customer_id,
            'seller_id' => Auth::user()->id,
            'order_type' => 'pos',
            'payment_method' =>  $request->type,
            'payment_status' => $request->type != 'cod' ? 'paid' : 'unpaid',
            'coupon_code' => $request->couponCode,
            'discount_amount' => $request->coupon_discount,
            'extra_discount' => $request->extra_discount,
            'shipping_address' => $customer->address ?? 'null',
            'shipping_cost' => $request->shipping_cost,
            'subtotal' => $request->subtotal,
            'total' => $request->amount,
        ]);

        $carts = Cart::where('user_id', Auth::user()->id)->get();
        foreach ($carts as $cart) {
            $variant = null;
            if ($cart->variation_id) {
                $variation = ProductVariation::find($cart->variation_id);

                if ($variation) {
                    $variant = $variation->attribute->name . ' - ' . $variation->attributeValue->value;
                }
            }
            $total = $cart->price * $cart->qty;
            OrderDetails::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'variation_id' => $cart->variation_id,
                'variant' => $variant,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'total' => $total,
            ]);
        }

        Cart::where('user_id', Auth::user()->id)->delete();
        return redirect()->back()->with(['clear_customer' => true, 'success' => 'Order Created Successful']);
    }

    public function applyCoupon(Request $request)
    {
        $coupon = Coupon::where('coupon_code', $request->coupon_code)
            ->where('status', 1)
            ->first();

        if (!$coupon) {
            return response()->json(['success' => false, 'error' => 'Invalid coupon']);
        }

        if ($coupon->expire_date < now()) {
            return response()->json(['success' => false, 'error' => 'Coupon expired']);
        }

        if ($request->subtotal < $coupon->minimum_purchase) {
            return response()->json(['success' => false, 'error' => 'Minimum purchase not met. Min: ' . $coupon->minimum_purchase]);
        }

        $discount = 0;
        $freeDelivery = false;

        if ($coupon->coupon_type == 'free_delivery') {
            $freeDelivery = true;
        } else {
            if ($coupon->discount_type == 'amount') {
                $discount = $coupon->discount_amount;
            } else {
                $discount = ($request->subtotal * $coupon->discount_amount) / 100;
            }
        }

        return response()->json([
            'success' => true,
            'discount' => $discount,
            'free_delivery' => $freeDelivery,
            'message' => 'Coupon applied successfully!'
        ]);
    }
}