<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Crear un usuario admin
         User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'birth_date' => '1990-01-01',
            'gender' => 'M',
            'role' => 'admin',
        ]);

        // Crear dos usuarios guest
        User::create([
            'name' => 'Guest User 1',
            'email' => 'guest1@example.com',
            'password' => Hash::make('password123'),
            'birth_date' => '1995-05-10',
            'gender' => 'F',
            'role' => 'guest',
        ]);

        User::create([
            'name' => 'Guest User 2',
            'email' => 'guest2@example.com',
            'password' => Hash::make('password123'),
            'birth_date' => '2000-07-15',
            'gender' => 'F',
            'role' => 'guest',
        ]);
    }
}
