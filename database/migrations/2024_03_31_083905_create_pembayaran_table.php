<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kode_transaksi')->unique();
            $table->uuid('biaya_id');
            $table->uuid('siswa_id');
            $table->date('tgl_pembayaran');
            $table->string('bukti_pembayaran')->nullable(); // Misalkan bisa null saat pertama kali dibuat
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->foreign('biaya_id')->references('id')->on('biaya')->onDelete('cascade');
            $table->foreign('siswa_id')->references('id')->on('akun_siswa')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
};
