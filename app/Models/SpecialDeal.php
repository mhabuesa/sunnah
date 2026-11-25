<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialDeal extends Model
{
    protected $guarded = ["id"];

    protected $casts = [
        'validity' => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}