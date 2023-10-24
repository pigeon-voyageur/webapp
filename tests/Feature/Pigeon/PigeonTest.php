<?php

namespace Tests\Feature\Pigeon;

use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PigeonTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_pigeon_is_created_with_an_user(): void
    {
        User::factory()->create();

        $this->assertDatabaseCount('users', 1);

        $this->assertDatabaseCount('pigeons', 1);
    }

    public function test_a_pigeon_cannot_get_a_news_if_guest(): void
    {
        $news = News::factory()->create();

        $response = $this
            ->post(route('pigeon.get-news', $news));

        $response->assertRedirect(route('login'));
    }

    public function test_a_pigeon_cannot_get_a_news_if_travelling(): void
    {
        $newsA = News::factory()->create();
        $newsB = News::factory()->create();
        $user = User::factory()->create();
        $user->pigeon->news()->attach($newsA, ['arrival_date' => now()->addYear()]);

        $this->assertTrue($user->pigeon->isTravelling());

        $response = $this
            ->actingAs($user)
            ->post(route('pigeon.get-news', $newsB));

        $response->assertForbidden();
    }

    public function test_a_pigeon_can_get_a_news_if_not_travelling(): void
    {
        $news = News::factory()->create();
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post(route('pigeon.get-news', $news));

        $response->assertRedirect(route('news.index'));
        $this->assertTrue($user->pigeon->isTravelling());
    }
}
