<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * database seed kori
     * age UserSeeder tarpor ListingSeeder then ReviewSeeder
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ListingSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
