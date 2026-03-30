<?php

use App\Models\BusinessSettingModel;
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
            ];

            $dbSetting = BusinessSettingModel::first();

            if ($dbSetting) {
                // DB data override করবে default কে

                $setting = [
                    'name' => $dbSetting->name ?? 'App Name',
                    'email' => 'mhabuesa@mail.com',
                    'phone' => '01706944396',
                    'address' => 'Dhaka-1217',
                    'powered' => 'Dev Hunter',
                    'header_logo' => null,
                    'footer_logo' => null,
                    'favicon' => null,
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