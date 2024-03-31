<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pilih_jurusan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('siswa_id');
            $table->uuid('pilihan_1');
            $table->uuid('pilihan_2');
            $table->boolean('status')->default(true);
            $table->timestamps();

            // Foreign keys
            $table->foreign('siswa_id')->references('id')->on('akun_siswa')->onDelete('cascade');
            $table->foreign('pilihan_1')->references('id')->on('jurusan')->onDelete('cascade');
            $table->foreign('pilihan_2')->references('id')->on('jurusan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pilih_jurusan');
    }
};
