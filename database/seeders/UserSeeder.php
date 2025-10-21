<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * database e user data insert
     * 6 ta host + 3 ta guest banabo
     */
    public function run(): void
    {
        // 6 Host user create kori
        User::create([
            'username' => 'niloy',
            'email' => 'niloy@gmail.com',
            'password' => Hash::make('1234'),
            'role' => 'host',
        ]);

        User::create([
            'username' => 'rafsan',
            'email' => 'rafiq@example.com',
            'password' => Hash::make('1234'),
            'role' => 'host',
        ]);

        User::create([
            'username' => 'akash',
            'email' => 'tasnim@example.com',
            'password' => Hash::make('1234'),
            'role' => 'host',
        ]);

        User::create([
            'username' => 'apu',
            'email' => 'karim@example.com',
            'password' => Hash::make('1234'),
            'role' => 'host',
        ]);

        User::create([
            'username' => 'shishir',
            'email' => 'sadia@example.com',
            'password' => Hash::make('1234'),
            'role' => 'host',
        ]);

        User::create([
            'username' => 'hifju',
            'email' => 'fahim@example.com',
            'password' => Hash::make('1234'),
            'role' => 'host',
        ]);

        // 3 ta Guest user create
        User::create([
            'username' => 'fatiha',
            'email' => 'nusrat@example.com',
            'password' => Hash::make('1234'),
            'role' => 'guest',
        ]);

        User::create([
            'username' => 'neon',
            'email' => 'arif@example.com',
            'password' => Hash::make('1234'),
            'role' => 'guest',
        ]);

        User::create([
            'username' => 'sorna',
            'email' => 'mim@example.com',
            'password' => Hash::make('1234'),
            'role' => 'guest',
        ]);
    }
}
