<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $guarded = ["id"];
    
    protected $casts = [
        'content' => 'array',
        'product' => 'array'
    ];
}