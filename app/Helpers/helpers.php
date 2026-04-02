<?php

use App\Models\AppSetting;
use App\Models\BusinessSettingModel;
use App\Models\Order;
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

if (!function_exists('setting')) {
    function setting()
    {
        static $setting;

        if (!$setting) {

            // Default values
            $default = [
                'name' => 'DevHunter ',
                'email' => 'mhabuesa@mail.com',
                'phone' => '01706944396',
                'address' => 'Dhaka-1217',
                'powered' => 'Dev Hunter',
                'header_logo' => null,
                'footer_logo' => null,
                'favicon' => null,
                'invoice' => 'invoice',
            ];

            $dbSetting = BusinessSettingModel::first();
            $appSetting = AppSetting::first();

            if ($dbSetting) {
                // DB data override করবে default কে

                $setting = [
                    'name' => $dbSetting->name ?? 'App Name',
                    'email' => $dbSetting->email ?? 'mhabuesa@mail.com',
                    'phone' => $dbSetting->phone ?? '01706944396',
                    'address' => $dbSetting->address ?? 'Dhaka-1217',
                    'powered' => $dbSetting->powered ?? 'Dev Hunter',
                    'header_logo' => $dbSetting->header_logo ?? null,
                    'footer_logo' => $dbSetting->footer_logo ?? null,
                    'favicon' => $dbSetting->favicon ?? null,
                    'invoice' => $appSetting->invoice ?? 'invoice',
                ];

                $setting = (object) array_merge($default, $setting);
            } else {
                // DB না থাকলে default object return
                $setting = (object) $default;
            }
        }

        return $setting;
    }
}

if (!function_exists('ordersCount')) {
    function ordersCount($status)
    {
        $orders = '';
        if ($status == 'all') {
            $orders = Order::all()->count();
        } else {
            $orders = Order::where('order_status', $status)->count();
        }

        return $orders;
    }
}