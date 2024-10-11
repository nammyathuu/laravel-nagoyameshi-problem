<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'kana' =>fake()->kanaName(),
            'email' =>fake()->safeEmail(),
            'password'=>fake()->randomNumber(9 , true),
            'address' =>fake()->address(),
            'phone_number' =>fake()->phoneNumber()
        ];
    }
}
