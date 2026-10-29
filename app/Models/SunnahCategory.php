<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SunnahCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function subcategories()
    {
        return $this->hasMany(SunnahSubcategory::class, 'category_id', 'id');
    }
}