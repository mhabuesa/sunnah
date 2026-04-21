<?php

namespace App\Providers;

use App\Models\AppSetting;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\TodaysDeal;
use App\Observers\AppSettingObserver;
use App\Observers\BannerObserver;
use App\Observers\CategoryObserver;
use App\Observers\LatestProductsObserver;
use App\Observers\TodaysDealObserver;
use App\Services\CartService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Paginator::useBootstrapFive();
        AppSetting::observe(AppSettingObserver::class);
        Category::observe(CategoryObserver::class);
        Banner::observe(BannerObserver::class);
        TodaysDeal::observe(TodaysDealObserver::class);
        Product::observe(LatestProductsObserver::class);

        if (!Schema::hasTable('app_settings')) {
            return;
        }

        $settings = cache()->rememberForever('appSettings', function () {
            return AppSetting::first();
        });


        $timezone = $settings->timezone ?? 'Asia/Dhaka';
        date_default_timezone_set($timezone);

        Config::set('app.timezone', $timezone);
        Config::set('app.name', $settings->app_name ?? 'DevHunter');
        Config::set('app.url', $settings->app_url ?? 'URL');

        // View Composer optimized with Caching
        View::composer('frontend.layouts.app', function ($view) {

            $categories = Cache::remember('categories', 86400, function () {
                return Category::where('status', 1)
                    ->select('id', 'name', 'logo', 'slug')
                    ->get();
            });

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

            $view->with([
                'categories' => $categories,
                'cartItems' => $cart,
                'cartProducts' => $products,
                'cartVariations' => $variations,
                'cartCount' => count($cart),
            ]);
        });
    }
}