<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('layanan_id');
            $table->foreignId('konsumen_id');
            $table->text('keterangan');
            $table->string('status_bayar');
            $table->string('status_ambil');
            $table->integer('total_bayar');
            $table->dateTime('tanggal_diterima')->nullable();
            $table->dateTime('tanggal_dibayar')->nullable();
            $table->dateTime('tanggal_diambil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
