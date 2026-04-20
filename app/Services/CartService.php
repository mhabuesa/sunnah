<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class CartService
{
    private static function key($productId, $variationId)
    {
        return $productId . '_' . $variationId;
    }

    public static function get()
    {
        return Session::get('cart', []);
    }

    public static function save($cart)
    {
        Session::put('cart', $cart);
    }

    public static function add($productId, $variationId, $qty = 1)
    {
        $key = self::key($productId, $variationId);
        $cart = self::get();

        if (isset($cart[$key])) {
            $cart[$key]['qty'] += $qty;
        } else {
            $cart[$key] = [
                'product_id' => $productId,
                'variation_id' => $variationId,
                'qty' => $qty,
            ];
        }

        self::save($cart);
    }

    public static function update($productId, $variationId, $qty)
    {
        $key = self::key($productId, $variationId);
        $cart = self::get();

        if (isset($cart[$key])) {
            $cart[$key]['qty'] = $qty;
        }

        self::save($cart);
    }

    public static function remove($productId, $variationId)
    {
        $key = self::key($productId, $variationId);
        $cart = self::get();

        unset($cart[$key]);

        self::save($cart);
    }

    public static function count()
    {
        return count(self::get());
    }

    public static function clear()
    {
        Session::forget('cart');
    }
}