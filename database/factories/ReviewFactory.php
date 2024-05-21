<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => User::inRandomOrder()->first()->id,
            'book_id' => Book::inRandomOrder()->first()->id,
            'rating' => $this->faker->numberBetween(1, 5),
            'content' => $this->faker->paragraph,
            'created_at' => Carbon::now()->subDays(random_int(1, 30)), // Random date between today and 30 days ago
            'updated_at' => Carbon::now()->subDays(random_int(1, 30)),
        ];
    }
}
