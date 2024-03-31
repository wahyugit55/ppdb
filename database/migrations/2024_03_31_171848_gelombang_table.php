<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('gelombang', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_gelombang');
            $table->uuid('tahun_pelajaran_id');
            $table->date('tgl_dibuka');
            $table->date('tgl_ditutup');
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->foreign('tahun_pelajaran_id')->references('id')->on('tahun_pelajaran')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('gelombang');
    }
};
