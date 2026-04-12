<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product($slug)
    {
        $product = Product::where('slug', $slug)->with('category', 'subcategory', 'brand', 'meta', 'galleries', 'variations')->first();
        return view('frontend.product.index', compact('product'));
    }

    public function products()
    {
        return view('frontend.product.all_products');
    }
}
