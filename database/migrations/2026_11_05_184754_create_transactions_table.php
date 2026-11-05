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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            // Payment Reference
            $table->string('transaction_id', 50)->unique();

            // Payment Type
            $table->enum('payment_type', [
                'product',
                'charity',
            ]);

            // Related Order or Donation ID
            $table->unsignedBigInteger('payable_id');

            // Payment Information
            $table->unsignedInteger('amount');
            $table->string('currency', 5)->default('BDT');
            $table->string('payment_method')->default('sslcommerz');

            // Gateway Information
            $table->string('gateway_transaction_id')->nullable();
            $table->string('bank_transaction_id')->nullable();

            // Transaction Status
            $table->string('status')->default('pending');

            // Gateway Response
            $table->json('gateway_response')->nullable();

            $table->timestamp('paid_at')->nullable();

            $table->timestamps();

            // Indexes
            $table->index(['payment_type', 'payable_id']);
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};