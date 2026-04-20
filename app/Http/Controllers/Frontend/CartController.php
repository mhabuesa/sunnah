<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        // dd($request->all());
        CartService::add(
            $request->product_id,
            $request->variation,
            $request->quantity ?? 1
        );


        $cart = CartService::get();


        return($cart);
    }
}