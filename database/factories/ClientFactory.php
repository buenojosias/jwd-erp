<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
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
            'reference' => fake()->randomElement(['Igreja', 'UTFPR', 'Vizinhança']),
            'whatsapp' => fake()->phoneNumber(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email()
        ];
    }
}
