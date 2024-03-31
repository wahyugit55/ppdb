<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class program_tambahan extends Seeder
{
    public function run()
    {
        DB::table('program_tambahan')->insert([
            [
                'id' => Str::uuid(),
                'nama_program' => 'Bahasa Asing',
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'nama_program' => 'Keterampilan Musik',
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'nama_program' => 'Olahraga Ekstrakurikuler',
                'status' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
