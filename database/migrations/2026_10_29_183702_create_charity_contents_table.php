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
        Schema::create('charity_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('charity_categories')->onDelete('cascade');
            $table->foreignId('subcategory_id')->constrained('charity_subcategories')->onDelete('cascade');
            $table->text('title');
            $table->longText('content');
            $table->string('status')->default(1);
            $table->string('priority')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('charity_contents');
    }
};