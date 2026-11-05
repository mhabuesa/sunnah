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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            // Donation Information
            $table->string('donation_no', 30)->unique();
            $table->json('purpose');

            // Donor Information
            $table->string('donor_name');
            $table->string('donor_phone', 20);
            $table->string('donor_email')->nullable();
            $table->boolean('is_anonymous')->default(false);

            // Payment Information
            $table->unsignedInteger('amount');
            $table->string('payment_method')->default('sslcommerz');
            $table->string('payment_status')->default('pending');
            $table->string('transaction_ref')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();

            // Indexes
            $table->index('payment_status');
            $table->index('transaction_ref');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};