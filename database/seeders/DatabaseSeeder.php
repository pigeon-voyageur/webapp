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
        $user = User::factory()
            ->hasNews(2)
            ->create([
                'name' => 'Testman',
                'email' => 'test@example.com',
            ]);

        $this->call([
            NewsSeeder::class,
        ]);
        
        $news = News::all();
        $user->pigeon->news()->attach($news[3], ['arrival_date' => now()->subDay()]);
        $user->pigeon->news()->attach($news[4], ['arrival_date' => now()->subYear()]);
    }
}
