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
        Schema::create('akun_siswa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nisn');
            $table->string('nama_lengkap');
            $table->string('jenis_sekolah');
            $table->string('asal_sekolah');
            $table->string('nomor_hp');
            $table->string('password');
            $table->string('no_pendaftaran')->unique();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun_siswa');
    }
};
