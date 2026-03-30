<?php

namespace App\Providers;

use App\Models\AppSetting;
use App\Observers\AppSettingObserver;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
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

        if (!Schema::hasTable('app_settings')) {
            return; // table না থাকলে কিছুই করবো না
        }

        $settings = cache()->rememberForever('appSettings', function () {
            return AppSetting::first();
        });

        Config::set('app.debug', $settings->debug_mode ?? false);
        Config::set('app.name', $settings->app_name ?? 'DevHunter');
        Config::set('app.url', $settings->app_url ?? 'URL');
        Config::set('app.timezone', $settings->timezone ?? 'Asia/Dhaka');
    }
}