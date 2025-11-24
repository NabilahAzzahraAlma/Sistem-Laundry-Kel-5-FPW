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
       Schema::create('order_details', function (Blueprint $table) {
        // Primary Key Custom
        $table->id('id_order_detail');

        // Relasi ke tabel orders
        $table->unsignedBigInteger('id_order');

        // Relasi ke tabel services
        $table->unsignedBigInteger('service_id'); // Pastikan namanya sama dengan di Controller (service_id)

        $table->integer('quantity');
        $table->integer('sub_total');
        $table->timestamps();

        // Foreign Keys (Agar data konsisten)
        $table->foreign('id_order')->references('id_order')->on('orders')->onDelete('cascade');
        $table->foreign('service_id')->references('id_service')->on('services');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_details');
    }
};
