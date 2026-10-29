<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SunnahProduct extends Model
{
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(SunnahCategory::class, 'category_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SunnahSubcategory::class, 'subcategory_id', 'id');
    }
}