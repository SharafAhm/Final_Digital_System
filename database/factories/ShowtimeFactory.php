<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Showtime>
 */
class ShowtimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // show schedule
        $schedule = [
            ['start' => '10:00', 'end' => '13:00'],
            ['start' => '13:30', 'end' => '16:30'],
            ['start' => '17:00', 'end' => '20:00'],
            ['start' => '20:30', 'end' => '23:30'],
        ];

        // randomly pick a schedule
        $randomSchedule = $schedule[array_rand($schedule)];
        $startTime = $randomSchedule['start'];
        $endTime = $randomSchedule['end'];

        return [
            'start_time' => $startTime,
            'end_time' => $endTime,
        ];
    }
}
