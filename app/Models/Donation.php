<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'purpose' => 'array',
        'amount' => 'integer',
        'is_anonymous' => 'boolean',
        'paid_at' => 'datetime',
    ];

    public static function generateDonationNumber(): string
    {
        do {
            $number = 'DON-' . now()->format('ymdHis')
                . '-' . strtoupper(substr(uniqid(), -4));
        } while (self::where('donation_no', $number)->exists());

        return $number;
    }
}