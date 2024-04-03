<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jadwal_seleksi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->dateTime('tgl_seleksi');
            $table->string('lokasi_seleksi');
            $table->string('link_seleksi')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_seleksi');
    }
};
