<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiayaTable extends Migration
{
    public function up()
    {
        Schema::create('biaya', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_biaya');
            $table->decimal('jumlah_biaya', 15, 2); // Asumsi menggunakan tipe decimal
            $table->boolean('status')->default(true);
            $table->boolean('status_wajib')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('biaya');
    }
}
