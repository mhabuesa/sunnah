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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_type');
            $table->string('coupon_title');
            $table->string('coupon_code')->unique();
            $table->string('coupon_limit');
            $table->string('discount_type')->nullable();
            $table->string('discount_amount')->nullable();
            $table->string('minimum_purchase');
            $table->dateTime('expire_date');
            $table->boolean('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};