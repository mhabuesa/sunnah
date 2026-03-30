<?php

namespace App\Observers;

use App\Models\AppSetting;

class AppSettingObserver
{
    /**
     * Handle the AppSetting "created" event.
     */
    public function created(AppSetting $appSetting): void
    {
        //
    }

    /**
     * Handle the AppSetting "updated" event.
     */
    public function updated(AppSetting $appSetting): void
    {
         cache()->forget('appSettings');
    }

    /**
     * Handle the AppSetting "deleted" event.
     */
    public function deleted(AppSetting $appSetting): void
    {
        //
    }

    /**
     * Handle the AppSetting "restored" event.
     */
    public function restored(AppSetting $appSetting): void
    {
        //
    }

    /**
     * Handle the AppSetting "force deleted" event.
     */
    public function forceDeleted(AppSetting $appSetting): void
    {
        //
    }
}