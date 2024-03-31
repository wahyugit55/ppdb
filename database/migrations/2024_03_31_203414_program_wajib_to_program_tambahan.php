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
        Schema::table('program_tambahan', function (Blueprint $table) {
            $table->boolean('program_wajib')->default(false)->after('nama_program');
        });
    }

    public function down()
    {
        Schema::table('program_tambahan', function (Blueprint $table) {
            $table->dropColumn('program_wajib');
        });
    }
};
