<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengumuman_kelulusan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('siswa_id');
            $table->string('no_surat');
            $table->string('bulan_surat');
            $table->year('tahun_surat');
            $table->string('status_kelulusan');
            $table->uuid('tgl_seleksi_id');
            $table->date('tgl_surat');
            $table->uuid('angsuran_id');
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('akun_siswa');
            $table->foreign('tgl_seleksi_id')->references('id')->on('siswa_jadwal_seleksi');
            $table->foreign('angsuran_id')->references('id')->on('template_angsuran');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengumuman_kelulusan');
    }
};
