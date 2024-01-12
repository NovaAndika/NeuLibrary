<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Muhammad Kusuma',
            'email' => 'mokusuma06@gmail.com',
            'password' => '123',
            'no_telp' => '08121212121212',
            'role' => 'admin',
        ]);
    }
}
