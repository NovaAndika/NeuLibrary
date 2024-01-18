<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $faker = faker::create('id_ID');

        // for($i =1;$i<=5;$i++){
            User::create([
                'name' => 'Muhammad Kusuma',
                'email' => 'qqq@q.qq',
                'password' => bcrypt('1qazxc') ,
                'no_telp' => '08121212121212',
                'role' => 'user'
            ]);
        // }
    }
}
