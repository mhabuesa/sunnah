<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderDetails;

class DummyOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 10000 dummy orders insert
        $orders = Order::factory()->count(10000)->create();

        foreach ($orders as $order) {
            // prottek order e ekta fixed detail
            OrderDetails::create([
                'order_id' => $order->id, // order ID
                'product_id' => 11,
                'variation_id' => 2,
                'variant' => 'Size - XL',
                'qty' => 1,
                'price' => 1200,
                'total' => 1200,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('Dummy orders and order details inserted successfully!');
    }
}