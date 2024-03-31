<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('siswa_jalur_seleksi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('siswa_id');
            $table->uuid('jalur_id');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('akun_siswa')->onDelete('cascade');
            $table->foreign('jalur_id')->references('id')->on('jalur_seleksi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa_jalur_seleksi');
    }
};
