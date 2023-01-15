<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Siska Rahmawati',
            'username' => 'sisk123',
            'email' => 'siskarahmawati@gmail.com',
            'password' => bcrypt('password'),
            'isAdmin' => true
        ]);
    }
}
