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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')->constrained()->onDelete('cascade');

            $table->string('flavor')->nullable(); // Classic, Pudina, Peri Peri, etc.
            $table->string('weight')->nullable(); // 100g, 250g, 500g, etc.

            $table->decimal('original_price', 10, 2);
            $table->decimal('discounted_price', 10, 2)->nullable();

            $table->integer('stock')->default(0);
            $table->boolean('is_default')->default(false); // for main display

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
