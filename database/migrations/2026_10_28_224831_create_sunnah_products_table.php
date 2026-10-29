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
        Schema::create('sunnah_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('sunnah_categories')->onDelete('cascade');
            $table->foreignId('subcategory_id')->constrained('sunnah_subcategories')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sunnah_products');
    }
};