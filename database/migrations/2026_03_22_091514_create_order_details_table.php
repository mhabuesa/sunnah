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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('landing_product_id')->nullable();
            $table->index('product_id');
            $table->unsignedBigInteger('variation_id')->nullable();
            $table->index('variation_id');
            $table->string('variant')->nullable();
            $table->integer('qty');
            $table->integer('price');
            $table->integer('total');
            $table->timestamps();

            // =========================
            // 🔥 COMPOSITE INDEX (VERY IMPORTANT)
            // =========================

            // same product + variation check (cart বা report এ useful)
            $table->index(['product_id', 'variation_id']);

            // order wise fast fetch
            $table->index(['order_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};