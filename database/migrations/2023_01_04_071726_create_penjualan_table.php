<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pesanan', 25)->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('pembayaran', 20)->nullable();
            $table->string('status', 30)->nullable();
            $table->date('tanggal')->nullable();

            $table->unsignedBigInteger('id_pelanggan');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan');

            $table->unsignedBigInteger('id_produk');
            $table->foreign('id_produk')->references('id')->on('produk');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
};
