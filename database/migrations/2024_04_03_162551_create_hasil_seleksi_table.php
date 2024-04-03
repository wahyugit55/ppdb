<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hasil_seleksi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('siswa_id');
            $table->foreign('siswa_id')->references('id')->on('akun_siswa')->onDelete('cascade');
            $table->decimal('nilai_tpa', 8, 2)->nullable();
            $table->text('nilai_wawancara');
            $table->text('nilai_agama');
            $table->text('nilai_buta_warna');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hasil_seleksi');
    }
};
