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
            // Mengubah nama kolom
            $table->renameColumn('waktu_pembayaran', 'tgl_awal_pembayaran');
            // Menambahkan kolom baru
            $table->dateTime('tgl_akhir_pembayaran')->after('waktu_pembayaran');
        });
    }

    public function down()
    {
        Schema::table('data_angsuran', function (Blueprint $table) {
            // Mengembalikan nama kolom ke semula jika migrasi dirollback
            $table->renameColumn('tgl_awal_pembayaran', 'waktu_pembayaran');
            // Menghapus kolom yang baru ditambahkan
            $table->dropColumn('tgl_akhir_pembayaran');
        });
    }
};
