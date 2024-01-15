<?php

namespace Database\Factories;

use App\Enums\ServiceStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $requested_at = fake()->dateTimeBetween('-30 days', 'now');
        return [
            'client_id' => rand(1, 12),
            'title' => fake()->sentence(),
            'description' => fake()->randomElement([null, fake()->text()]) ,
            'amount' => rand(50, 300),
            'status' => fake()->randomElement(ServiceStatus::cases())->value,
            'requested_at' => $requested_at,
            'start_date' => fake()->randomElement([null, fake()->dateTimeBetween($requested_at, '+30 days')]),
            'end_date' => fake()->randomElement([null, fake()->dateTimeBetween($requested_at, '+30 days')]),
            'finished_at' => fake()->randomElement([null, fake()->dateTimeBetween($requested_at, '+30 days')]) ,
        ];
    }
}
