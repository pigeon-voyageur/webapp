<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
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
            'lat' => fake()->latitude(),
            'lng' => fake()->longitude(),
            'sources' => [
                [
                    'url' => fake()->url(),
                    'label' => fake()->word(),
                ],
            ],
            'resources' => [
                [
                    'url' => fake()->url(),
                    'label' => fake()->word(),
                ],
            ],
        ];
    }
}
