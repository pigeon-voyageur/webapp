<?php

namespace Tests\Unit\Pigeon;

use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PigeonTest extends TestCase
{
    use RefreshDatabase;

    public function test_is_travelling_should_be_false_if_no_pigeon_message(): void
    {
        $user = User::factory()->create();

        $this->assertFalse($user->pigeon->isTravelling());
    }

    public function test_is_travelling_should_be_false_if_past_pigeon_message(): void
    {
        $user = User::factory()->create();
        $user2 = User::factory()->create();
        $news = News::factory(
            [
                'user_id' => $user2->id
            ]
        )->create();

        $user->pigeon->news()->attach($news, ['arrival_date' => now()->subSecond()]);

        $this->assertFalse($user->pigeon->isTravelling());
    }

    public function test_is_travelling_should_be_true_if_current_pigeon_message(): void
    {
        $user = User::factory()->create();
        $user2 = User::factory()->create();
        $news = News::factory(
            [
                'user_id' => $user2->id
            ]
        )->create();

        $user->pigeon->news()->attach($news, ['arrival_date' => now()->addYear()]);

        $this->assertTrue($user->pigeon->isTravelling());
    }
}
