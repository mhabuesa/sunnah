<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\SpecialDeal;

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


    public static function specialDeal($productId, int $qty): void
    {
        $specialDeal = SpecialDeal::where('product_id', $productId)->first();

        if ($specialDeal) {
            $specialDeal->increment('sold', $qty);

            if ($specialDeal->available >= $qty) {
                $specialDeal->decrement('available', $qty);
            }
        }
    }
    public static function specialDealRestore(Order $order): void
    {
        $orderDetails = $order->orderDetails()
            ->lockForUpdate()
            ->get();

        foreach ($orderDetails as $detail) {
            $specialDeal = SpecialDeal::where('product_id', $detail->product_id)
                ->lockForUpdate()
                ->first();

            if ($specialDeal) {
                $restoreQty = min($detail->qty, $specialDeal->sold);

                if ($restoreQty > 0) {
                    $specialDeal->decrement('sold', $restoreQty);
                    $specialDeal->increment('available', $restoreQty);
                }
            }
        }
    }
}