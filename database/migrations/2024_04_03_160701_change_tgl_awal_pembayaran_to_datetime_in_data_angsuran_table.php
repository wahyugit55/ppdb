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
        Schema::table('data_angsuran', function (Blueprint $table) {
            // Mengubah tipe data kolom tgl_awal_pembayaran menjadi datetime
            $table->dateTime('tgl_awal_pembayaran')->change();
        });
    }

    public function down()
    {
        Schema::table('data_angsuran', function (Blueprint $table) {
            // Mengembalikan tipe data kolom tgl_awal_pembayaran menjadi date
            $table->date('tgl_awal_pembayaran')->change();
        });
    }
};
