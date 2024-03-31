<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('siswa_gelombang', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('siswa_id');
            $table->uuid('gelombang_id');
            $table->boolean('status')->default(true);
            $table->timestamps();

            // Membuat foreign key constraint
            $table->foreign('siswa_id')->references('id')->on('akun_siswa')->onDelete('cascade');
            $table->foreign('gelombang_id')->references('id')->on('gelombang')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('siswa_gelombang');
    }
};
