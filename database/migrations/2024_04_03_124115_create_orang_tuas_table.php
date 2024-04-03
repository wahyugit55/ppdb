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
        Schema::create('orang_tua', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('siswa_id');
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->decimal('penghasilan_ayah', 15, 2)->nullable();
            $table->string('no_hp_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->decimal('penghasilan_ibu', 15, 2)->nullable();
            $table->string('no_hp_ibu');
            $table->boolean('status')->default(true);
            $table->timestamps();
        
            $table->foreign('siswa_id')->references('id')->on('akun_siswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orang_tuas');
    }
};
