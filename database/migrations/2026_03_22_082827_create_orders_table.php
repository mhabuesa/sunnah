<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no', 20)->unique();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->string('seller_id')->nullable();
            $table->string('order_type')->nullable(); // pos / web
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('transaction_ref')->nullable();
            $table->string('coupon_code')->nullable();
            $table->integer('discount_amount')->nullable();
            $table->integer('extra_discount')->nullable();
            $table->string('shipping_address');
            $table->integer('shipping_cost');
            $table->integer('subtotal')->nullable();
            $table->integer('total');
            $table->string('delivery_method')->nullable();
            $table->string('delivery_cons_id')->nullable();
            $table->text('order_note')->nullable();
            $table->string('order_status')->default('pending');
            $table->boolean('is_seen')->default(0);
            $table->dateTime('scheduled_at')->nullable();
            $table->timestamps();

            // =========================
            // 🔥 INDEX SECTION
            // =========================

            $table->index('order_type');
            $table->index('payment_status');
            $table->index('order_status');
            $table->index('created_at');

            // 🔥 Composite Index (VERY POWERFUL)
            $table->index(['customer_id', 'order_status']);
            $table->index(['order_type', 'is_seen']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};