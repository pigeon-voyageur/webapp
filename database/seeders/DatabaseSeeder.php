<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\News;
use App\Models\Town;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $town = Town::factory()
            ->hasUsers(4)
            ->create();

        $friends = $town->users;

        User::factory()
            ->for($town)
            ->create([
                'name' => 'Testman',
                'email' => 'test@example.com',
            ]);

        $this->call([
            NewsSeeder::class,
        ]);

        $friends->each(function ($friend) {
            $friend->pigeon->news()->attach(News::inRandomOrder()->first(), ['arrival_date' => now()->subSecond()]);
        });
    }
}
