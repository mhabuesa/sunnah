<?php

namespace App\Observers;

use App\Models\TodaysDeal;

class TodaysDealObserver
{
    /**
     * Handle the TodaysDeal "created" event.
     */
    public function created(TodaysDeal $todaysDeal): void
    {
        cache()->forget('todaysDeals');
    }

    /**
     * Handle the TodaysDeal "updated" event.
     */
    public function updated(TodaysDeal $todaysDeal): void
    {
        cache()->forget('todaysDeals');
    }

    /**
     * Handle the TodaysDeal "deleted" event.
     */
    public function deleted(TodaysDeal $todaysDeal): void
    {
        cache()->forget('todaysDeals');
    }

    /**
     * Handle the TodaysDeal "restored" event.
     */
    public function restored(TodaysDeal $todaysDeal): void
    {
        //
    }

    /**
     * Handle the TodaysDeal "force deleted" event.
     */
    public function forceDeleted(TodaysDeal $todaysDeal): void
    {
        //
    }
}