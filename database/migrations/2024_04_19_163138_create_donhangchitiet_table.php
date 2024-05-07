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
        Schema::create('donhangchitiet', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('checkout_id');
            $table->unsignedBigInteger('product_id');
            $table->bigInteger('quantity');
            
            $table->foreign('checkout_id')->references('id')->on('checkout');
            $table->foreign('product_id')->references('id')->on('sanpham');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donhangchitiet');
    }
};
