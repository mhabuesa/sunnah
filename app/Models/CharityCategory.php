<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharityCategory extends Model
{
    protected $guarded = ['id'];

     public function subcategories()
    {
        return $this->hasMany(CharitySubcategory::class, 'category_id', 'id');
    }
}