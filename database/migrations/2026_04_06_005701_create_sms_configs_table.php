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
        Schema::create('sms_configs', function (Blueprint $table) {
            $table->id();
            $table->text('api_key');
            $table->string('sender_id');
            $table->boolean('account_create_sms')->default(0);
            $table->boolean('order_placed_sms')->default(0);
            $table->boolean('sent_to_delivery_sms')->default(0);
            $table->boolean('order_cancelled_sms')->default(0);
            $table->boolean('delivery_success_sms')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms_configs');
    }
};