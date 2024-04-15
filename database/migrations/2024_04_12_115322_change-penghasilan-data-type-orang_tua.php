<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orang_tua', function (Blueprint $table) {
            $table->string('penghasilan_ayah')->nullable()->change();
            $table->string('penghasilan_ibu')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orang_tua', function (Blueprint $table) {
            // Ubah kembali tipe data kolom ke tipe data sebelumnya (jika ada)
        });
    }
};
