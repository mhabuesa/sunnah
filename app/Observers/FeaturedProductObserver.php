<?php

namespace App\Observers;

use App\Models\FeaturedProduct;

class FeaturedProductObserver
{
    /**
     * Handle the FeaturedProduct "created" event.
     */
    public function created(FeaturedProduct $featuredProduct): void
    {
        cache()->forget('featuredProducts');
    }

    /**
     * Handle the FeaturedProduct "updated" event.
     */
    public function updated(FeaturedProduct $featuredProduct): void
    {
        cache()->forget('featuredProducts');
    }

    /**
     * Handle the FeaturedProduct "deleted" event.
     */
    public function deleted(FeaturedProduct $featuredProduct): void
    {
        cache()->forget('featuredProducts');
    }

    /**
     * Handle the FeaturedProduct "restored" event.
     */
    public function restored(FeaturedProduct $featuredProduct): void
    {
        //
    }

    /**
     * Handle the FeaturedProduct "force deleted" event.
     */
    public function forceDeleted(FeaturedProduct $featuredProduct): void
    {
        //
    }
}