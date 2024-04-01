<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('data_diri', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('siswa_id');
            $table->string('ukuran_baju');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('akun_siswa')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_diri');
    }
};
