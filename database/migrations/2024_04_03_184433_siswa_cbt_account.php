<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siswa_cbt_account', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('siswa_id');
            $table->string('url');
            $table->string('username');
            $table->string('password_cbt');
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
        Schema::dropIfExists('siswa_cbt_account');
    }
};
