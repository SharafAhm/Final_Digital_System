<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File; // Use the File facade

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to the JSON file
        $jsonPath = base_path('movies.json');

        // Read the JSON file
        $json = File::get($jsonPath);

        // Decode the JSON data to an array
        $movies = json_decode($json, true);

        // Insert data into the database
        foreach ($movies as $movie) {
            Movie::create([
                'title' => $movie['title'],
                'description' => $movie['description'],
                'release_date' => $movie['release_date'],
                'poster_url' => $movie['poster_url'],
                'age_rating' => $movie['age_rating'],
                'ticket_price' => $movie['ticket_price'],
                'duration_minutes' => $movie['duration_minutes'],
            ]);
        }
    }
}