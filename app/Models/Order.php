<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public static function generateInvoiceNumber()
    {
        $today = date('ymd');
        $lastOrder = Order::where('invoice_no', 'like', 'INV-' . $today . '-%')
            ->latest()
            ->first();

        if ($lastOrder) {
            $lastNumber = (int) substr($lastOrder->invoice_no, strrpos($lastOrder->invoice_no, '-') + 1);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return 'INV-' . $today . '-' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);
    }
}