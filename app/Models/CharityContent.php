<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharityContent extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(CharityCategory::class, 'category_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(CharitySubcategory::class, 'subcategory_id', 'id');
    }
}