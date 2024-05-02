<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MovieSeeder::class,
            ShowtimeSeeder::class,
            DateSeeder::class,
            SeatSeeder::class,
            UserSeeder::class,
        ]);

        // User::factory()->student()->create();
        // User::factory()->admin()->create();
    }
}
