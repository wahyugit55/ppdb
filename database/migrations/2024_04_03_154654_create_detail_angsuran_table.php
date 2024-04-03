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
        Schema::create('detail_angsuran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('data_angsuran_id');
            $table->string('uraian');
            $table->bigInteger('jumlah_pembayaran');
            $table->boolean('status')->default(true);
            $table->timestamps();
        
            $table->foreign('data_angsuran_id')->references('id')->on('data_angsuran')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_angsuran');
    }
};
