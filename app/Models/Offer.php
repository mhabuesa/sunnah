<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Offer extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'validity_date' => 'date',
        'status' => 'integer',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'offer_products', 'offer_id', 'product_id');
    }
    
    public function coupons()
    {
        return $this->belongsTo(Coupon::class, 'id', 'coupon_id');
    }

    
}