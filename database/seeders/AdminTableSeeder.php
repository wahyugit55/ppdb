<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            'id' => 'uuid', // Gunakan UUID yang sesuai atau generate secara otomatis
            'name' => 'Admin Name',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Ganti 'password' dengan password yang diinginkan
            'role' => 'admin',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
