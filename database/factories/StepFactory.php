<?php

namespace Database\Factories;

use App\Enums\StepStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Step>
 */
class StepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_id' => 20,
            'title' => fake()->sentence(),
            'description' => fake()->text(125),
            'status' => fake()->randomElement(StepStatusEnum::cases())->value,
            'start_date' => fake()->dateTimeBetween('-10 days', '+10 days'),
            'end_date' => fake()->dateTimeBetween('-10 days', '+10 days'),
        ];
    }
}
