<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    protected $guarded = ["id"];
    
    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }
    
    public function attributeValue()
    {
        return $this->belongsTo(AttributeValue::class, 'attributeValue_id');
    }
    public function variant()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}