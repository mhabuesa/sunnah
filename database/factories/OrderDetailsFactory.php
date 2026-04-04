<?php

namespace Database\Factories;

use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrderDetails>
 */
class OrderDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => 1, // order ID jehetu tumi ekta dummy insert korcho
            'product_id' => 11,
            'variation_id' => 2,
            'variant' => 'Size - XL',
            'qty' => 1,
            'price' => 1200,
            'total' => 1200,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}