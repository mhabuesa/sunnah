<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ["id"];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}