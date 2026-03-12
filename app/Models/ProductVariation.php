<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    protected $guarded = ["id"];

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
    
    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }
}