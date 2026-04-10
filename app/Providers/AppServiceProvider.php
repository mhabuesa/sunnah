<?php

namespace App\Providers;

use App\Models\AppSetting;
use App\Models\Category;
use App\Observers\AppSettingObserver;
use App\Observers\CategoryObserver;
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
        AppSetting::observe(AppSettingObserver::class);
        Category::observe(CategoryObserver::class);

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
                return Category::where('status', 1)->select('id', 'name', 'logo', 'slug')->get();
            });

            $view->with('categories', $categories);
        });
    }
}
