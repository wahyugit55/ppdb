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
        Schema::table('orang_tua', function (Blueprint $table) {
            $table->string('pekerjaan_ayah')->nullable()->change();
            $table->string('pekerjaan_ibu')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('orang_tua', function (Blueprint $table) {
            // Ubah kembali tipe data kolom ke tipe data sebelumnya (jika ada)
        });
    }
};
