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
        Schema::create('data_angsuran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('template_angsuran_id');
            $table->string('jenis_pembayaran');
            $table->date('waktu_pembayaran');
            $table->boolean('status')->default(true);
            $table->timestamps();
        
            $table->foreign('template_angsuran_id')->references('id')->on('template_angsuran')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_angsuran');
    }
};
