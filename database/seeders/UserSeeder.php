<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Yusuf Supriadi',
            'email' => 'yusufdolenk2@gmail.com',
            'password' => Hash::make('password'),
            'role'  => 'Admin'
        ]);

        User::create([
            'name' => 'Demo Account',
            'email' => 'demo@mail.com',
            'password' => Hash::make('password'),
            'role'  => 'guest'
        ]);

        User::create([
            'name' => 'Firlana Luchiana Dewi',
            'email' => 'frluchiana55@gmail.com',
            'password' => Hash::make('password'),
            'role'  => 'user'
        ]);
    }
}
