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
        Schema::create('tahun_pelajaran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_tahun_pelajaran');
            $table->string('semester');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tahun_pelajaran');
    }
};
