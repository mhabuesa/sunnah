<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharitySubcategory extends Model
{
    protected $guarded = ['id'];

     public function category()
    {
        return $this->belongsTo(CharityCategory::class, 'category_id');
    }
}