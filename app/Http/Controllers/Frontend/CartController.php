<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function cart()
    {
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
}