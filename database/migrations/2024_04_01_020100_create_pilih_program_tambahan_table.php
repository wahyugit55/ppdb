<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pilih_program_tambahan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('siswa_id');
            $table->uuid('program_tambahan_id');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('akun_siswa')->onDelete('cascade');
            $table->foreign('program_tambahan_id')->references('id')->on('program_tambahan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pilih_program_tambahan');
    }
};
