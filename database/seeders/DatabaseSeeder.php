<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\News;
use App\Models\User;
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

        $this->call([
            NewsSeeder::class,
        ]);

        $news = News::all();
        User::first()->pigeon->news()->attach($news[0], ['arrival_date' => now()->subDay()]);
        User::first()->pigeon->news()->attach($news[1], ['arrival_date' => now()->subYear()]);
    }
}
