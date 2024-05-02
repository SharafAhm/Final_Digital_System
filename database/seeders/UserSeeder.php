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
    //public function run(): void
    //{
    //    User::factory()->count(1)->create();
    //    User::factory()->admin()->create();
    //}

    public function run(): void
    {
        // Create a specific admin user
        User::create([
            'username' => 'admin',
            'password' => Hash::make('12345678'),  // Hash the password
            'name' => 'Administrator',
            'age' => 20,
            'role' => 'admin'
        ]);
    }
}