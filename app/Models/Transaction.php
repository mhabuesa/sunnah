<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = ['id'];

    public static function generateTransactionID(): string
    {
        do {
            $number = 'TRX-' . now()->format('ymdHis')
                . '-' . strtoupper(substr(uniqid(), -4));
        } while (self::where('transaction_id', $number)->exists());

        return $number;
    }
}