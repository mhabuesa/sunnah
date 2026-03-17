<?php

use App\Models\Product;

if (!function_exists('productPrice')) {
    function productPrice($productId)
    {
        $product = Product::with('variations')->find($productId);

        if (!$product) {
            return 0;
        }

        if ($product->variations->count() > 0) {
            return $product->variations->min('price');
        }

        return $product->price;
    }
}

if (!function_exists('productStock')) {
    function productStock($productId)
    {
        $product = Product::with('variations')->find($productId);

        if (!$product) {
            return 0;
        }

        if ($product->variations->count() > 0) {
            return $product->variations->sum('stock');
        }

        return $product->stock;
    }
}