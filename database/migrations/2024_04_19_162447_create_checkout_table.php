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
        Schema::create('checkout', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('voucher_id');
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->boolean('status')->default('0');//trạng thái tài khoản 1 là kích hoạt| 0 là chưa
            $table->string('token');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('voucher_id')->references('id')->on('voucher');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout');
    }
};
