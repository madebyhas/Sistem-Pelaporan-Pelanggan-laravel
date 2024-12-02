<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Petugas::create([
         'nama_petugas' => 'Admin',
         'username' => 'admin1',
         'password' => Hash::make('password'),
         'telp' => '082146384783',
         'level' => 'admin',
        ]);    
    }
}
