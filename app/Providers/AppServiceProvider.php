<?php

namespace App\Providers;

use App\Models\AppSetting;
use App\Observers\AppSettingObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

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

        $settings = cache()->rememberForever('appSettings', function () {
            return AppSetting::first();
        });

        Config::set('app.debug', (bool) ($settings->debug_mode ?? false));
        Config::set('app.name', ($settings->app_name ?? 'DevHunter'));
        Config::set('app.url', ($settings->app_url ?? 'URL'));
        Config::set('app.tomezone', ($settings->tomezone ?? 'asia/dhaka'));
    }
}