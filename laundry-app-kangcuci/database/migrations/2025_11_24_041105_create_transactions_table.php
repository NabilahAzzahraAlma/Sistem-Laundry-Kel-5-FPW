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
          $table->id('id_transaksi');
        $table->unsignedBigInteger('id_order');
        // id_order_detail & id_service opsional di sini karena sudah ada di relasi order,
        // tapi saya buat sesuai catatan kertas:
        $table->unsignedBigInteger('id_order_detail')->nullable();
        $table->unsignedBigInteger('id_user');
        $table->unsignedBigInteger('id_service')->nullable();

        $table->integer('jumlah_transaksi');
        $table->string('method_payment');
        $table->dateTime('transaksi_date');
        $table->string('transaksi_status');
        $table->timestamps();

        // Foreign Keys
        $table->foreign('id_order')->references('id_order')->on('orders')->onDelete('cascade');
        $table->foreign('id_user')->references('id_user')->on('users');
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
