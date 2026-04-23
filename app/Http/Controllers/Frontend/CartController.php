<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Services\CartService;
use Devfaysal\BangladeshGeocode\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{

    public function cart()
    {


        $districts = District::all();

        $cart = CartService::get();

        $products = collect();
        $variations = collect();

        if (!empty($cart)) {

            $productIds = collect($cart)->pluck('product_id')->unique();
            $variationIds = collect($cart)->pluck('variation_id')->filter()->unique();

            // products
            $products = Product::whereIn('id', $productIds)
                ->select('id', 'name', 'image', 'slug', 'price')
                ->get()
                ->keyBy('id');

            // variations (important)
            if ($variationIds->isNotEmpty()) {
                $variations = ProductVariation::whereIn('id', $variationIds)
                    ->get()
                    ->keyBy('id');
            }
        }

        return view('frontend.cart.index', [
            'cartItems' => $cart,
            'cartProducts' => $products,
            'cartVariations' => $variations,
            'cartCount' => count($cart),
            'districts' => $districts
        ]);
    }
    public function add_to_cart(Request $request)
    {
        CartService::add(
            $request->product_id,
            $request->variation,
            $request->quantity ?? 1
        );
        return  redirect()->back()->with('success', 'Item Added to Cart');
    }

    public function updateCart(Request $request)
    {
        CartService::update(
            $request->product_id,
            $request->variation_id,
            $request->qty
        );

        return response()->json([
            'status' => true,
            'cart_count' => CartService::count()
        ]);
    }

    public function removeCart(Request $request)
    {
        CartService::remove(
            $request->product_id,
            $request->variation_id
        );

        return response()->json([
            'status' => true,
            'cart_count' => CartService::count()
        ]);
    }

    public function applyCoupon(Request $request)
    {
        $coupon = Coupon::where('coupon_code', $request->coupon_code)
            ->where('status', 1)
            ->first();

            Log::info($coupon);

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