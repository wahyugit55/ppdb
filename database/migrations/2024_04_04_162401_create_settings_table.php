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
        Schema::create('settings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_sekolah');
            $table->string('npsn')->nullable();
            $table->text('alamat');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('file_logo')->nullable();
            $table->string('nama_cs')->nullable();
            $table->string('no_cs')->nullable();
            $table->text('info_bayar')->nullable();
            $table->string('nama_kepsek')->nullable();
            $table->string('nip_kepsek')->nullable();
            $table->dateTime('ppdb_open')->nullable();
            $table->dateTime('ppdb_close')->nullable();
            $table->string('no_rek')->nullable();
            $table->string('atas_nama_rek')->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('file_kop_surat')->nullable();
            $table->string('file_ttd')->nullable();
            $table->string('file_stempel')->nullable();
            $table->integer('width_ttd')->nullable();
            $table->integer('width_stempel')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
