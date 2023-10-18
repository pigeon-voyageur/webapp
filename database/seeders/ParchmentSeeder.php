<?php

namespace Database\Seeders;

use App\Models\Parchment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ParchmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Parchment::factory()->count(50)->create();
    }
}
