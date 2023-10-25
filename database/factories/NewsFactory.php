<?php

namespace Database\Factories;

use App\Models\NewsCategory;
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
            'news_category_id' => NewsCategory::inRandomOrder()->first()->id,
            'summary' => fake()->paragraph(),
            'lat' => fake()->latitude(),
            'lng' => fake()->longitude(),
        ];
    }
}
