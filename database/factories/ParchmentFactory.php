<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parchment>
 */
class ParchmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'summary' => fake()->paragraph(),
            'video' => 'https://www.youtube.com/watch?v=DlcGxjtcr3s',
            'lat' => fake()->latitude(),
            'lng' => fake()->longitude(),
        ];
    }
}