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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 22, 2);
            $table->decimal('discount_price', 22, 2)->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('product_cate_id');
            $table->timestamps();
            //tao index tang toc do xu li
            $table->index('product_cate_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
