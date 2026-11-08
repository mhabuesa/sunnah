<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariation;

class OrderStockService
{
    /**
     * Restore reserved stock when payment fails or is cancelled.
     *
     * Call this method inside a database transaction.
     */
    public static function restore(Order $order): void
    {
        $orderDetails = $order->orderDetails()
            ->lockForUpdate()
            ->get();

        foreach ($orderDetails as $detail) {

            if ($detail->variation_id) {

                $variation = ProductVariation::whereKey($detail->variation_id)
                    ->lockForUpdate()
                    ->first();

                if ($variation) {
                    $variation->increment('stock', $detail->qty);
                }

            } else {

                $product = Product::whereKey($detail->product_id)
                    ->lockForUpdate()
                    ->first();

                if ($product) {
                    $product->increment('stock', $detail->qty);
                }
            }
        }
    }
}