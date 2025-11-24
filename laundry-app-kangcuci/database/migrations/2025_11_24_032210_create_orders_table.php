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
        Schema::create('orders', function (Blueprint $table) {
          $table->id('id_order');
        $table->unsignedBigInteger('id_user'); // Pemesan
        $table->integer('total')->default(0);

        // id_payment mungkin referensi ke metode pembayaran atau payment gateway
        $table->string('id_payment')->nullable();
        $table->string('status_payment')->default('pending'); // pending, paid
        $table->date('order_date');
        $table->timestamp('update_order')->useCurrent(); // Tanggal update terakhir
        $table->string('status_progress')->default('pending'); // pending, process, done

        $table->timestamps();

        $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
