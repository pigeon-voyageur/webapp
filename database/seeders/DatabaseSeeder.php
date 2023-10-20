<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\News;
use App\Models\User;
use App\Models\Pigeon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Testman',
            'email' => 'test@example.com',
        ]);

        // Pigeon::factory()
        //     ->for(User::factory())
        //     ->hasAttached(News::factory()->count(3),[
        //         'arrival_date' => fake()->dateTimeBetween('now', '+1 month')
        //     ])
        //     ->create();

        $this->call([
            NewsSeeder::class,
        ]);
    }
}
