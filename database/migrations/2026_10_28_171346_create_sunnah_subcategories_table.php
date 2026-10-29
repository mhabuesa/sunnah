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
        Schema::create('sunnah_subcategories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('sunnah_categories')->onDelete('cascade');
            $table->string('subcategory')->unique();
            $table->unsignedInteger('priority')->default(0);
            $table->string('slug')->unique();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sunnah_subcategories');
    }
};