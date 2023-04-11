<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "first_name" => fake('nl_NL')->firstName(),
            "last_name" => fake('nl_NL')->lastName(),
            'street' => fake('nl_NL')->streetName(),
            'house_number' => fake('nl_NL')->buildingNumber(),
            'postal_code' => trim(fake('nl_NL')->postcode()),
            'city' => fake('nl_NL')->city(),
            'age' => fake('nl_NL')->randomElement([18, 22, 24, 34, 55, 67]),
            'sex' => fake('nl_NL')->randomElement(['Man', 'Vrouw']),
            'email' => fake('nl_NL')->unique()->safeEmail(),
            'password' => bcrypt('test1234'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
