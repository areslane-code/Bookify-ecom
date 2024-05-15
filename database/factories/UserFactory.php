<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lastname' => $this->faker->lastName,
            'firstname' => $this->faker->firstName,
            'role' => 0,
            'phoneNumber' => '0' . $this->faker->numerify('#########'), // Generate a phone number starting with 0 followed by 9 digits
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'created_at' =>  $this->faker->dateTimeBetween('2023-01-01', now()),
            'updated_at' =>  $this->faker->dateTimeBetween('2023-01-01', now()),
        ];
    }
}
