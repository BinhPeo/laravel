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
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->double('price', 10, 2);
            $table->double('sale', 10, 2)->nullable();
            $table->boolean('hot')->default('0'); // 1 là hot | 0 là không hot
            $table->boolean('active')->default('1');
            $table->text('mota')->nullable();
            $table->text('motangan')->nullable();
            $table->unsignedBigInteger('id_danhmuc');
            // $table->unsignedBigInteger('id_loaisp');
            // $table->foreign('id_loaisp')->references('id')->on('loaisp');
            $table->foreign('id_danhmuc')->references('id')->on('danhmuc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanpham');
    }
};