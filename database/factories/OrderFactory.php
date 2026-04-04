<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $invoiceCounter = 1;

        return [
            'invoice_no' => 'INV-' . now()->format('ymd') . '-' . $invoiceCounter++,
            'customer_id' => 2, // ekta existing customer ID
            'seller_id' => '1',
            'order_type' => 'pos',
            'payment_method' => 'cod',
            'payment_status' => 'unpaid',
            'shipping_address' => '192/2, Shantibag, Dhaka-1217',
            'shipping_cost' => 70,
            'subtotal' => 1500,
            'total' => 1570,
            'order_status' => 'pending',
            'is_seen' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}