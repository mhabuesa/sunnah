<?php

namespace App\Observers;

use App\Models\SpecialDeal;

class SpecialDealObserver
{
    /**
     * Handle the SpecialDeal "created" event.
     */
    public function created(SpecialDeal $specialDeal): void
    {
        cache()->forget('specialDeals');
    }

    /**
     * Handle the SpecialDeal "updated" event.
     */
    public function updated(SpecialDeal $specialDeal): void
    {
        cache()->forget('specialDeals');
    }

    /**
     * Handle the SpecialDeal "deleted" event.
     */
    public function deleted(SpecialDeal $specialDeal): void
    {
        cache()->forget('specialDeals');
    }

    /**
     * Handle the SpecialDeal "restored" event.
     */
    public function restored(SpecialDeal $specialDeal): void
    {
        cache()->forget('specialDeals');
    }

    /**
     * Handle the SpecialDeal "force deleted" event.
     */
    public function forceDeleted(SpecialDeal $specialDeal): void
    {
        cache()->forget('specialDeals');
    }
}