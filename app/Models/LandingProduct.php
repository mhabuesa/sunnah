<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingProduct extends Model
{
    protected $guarded = ["id"];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'landing_product_id');
    }
}
