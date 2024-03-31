<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('jurusan', function (Blueprint $table) {
            // Add the program_tambahan_id column and make it nullable
            $table->uuid('program_tambahan_id')->nullable()->after('status');

            // Define the foreign key relationship
            $table->foreign('program_tambahan_id')->references('id')->on('program_tambahan')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('jurusan', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['program_tambahan_id']);

            // Remove the program_tambahan_id column
            $table->dropColumn('program_tambahan_id');
        });
    }
};
