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
        Schema::create('alamat', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('siswa_id');
            $table->char('provinces_id', 2);
            $table->char('regencies_id', 4);
            $table->char('districts_id', 7);
            $table->char('villages_id', 10);
            $table->boolean('status')->default(true);
            $table->timestamps();
        
            $table->foreign('siswa_id')->references('id')->on('akun_siswa')->onDelete('cascade');
            $table->foreign('provinces_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('regencies_id')->references('id')->on('regencies')->onDelete('cascade');
            $table->foreign('districts_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('villages_id')->references('id')->on('villages')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamat');
    }
};
