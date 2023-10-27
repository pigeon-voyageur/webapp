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
        $user = User::factory()->create();
        $news = News::factory(
            [
                'user_id' => $user->id,
            ]
        )->create();

        $response = $this
            ->post(route('pigeon.get-news', $news));

        $response->assertRedirect(route('login'));
    }

    public function test_a_pigeon_cannot_get_a_news_if_travelling(): void
    {
        $user = User::factory()->create();
        $user2 = User::factory()->create();
        $news1 = News::factory(
            [
                'user_id' => $user2->id,
            ]
        )->create();
        $news2 = News::factory()->create(
            [
                'user_id' => $user2->id,
            ]
        );
        $user->pigeon->news()->attach($news1, ['arrival_date' => now()->addYear()]);

        $this->assertTrue($user->pigeon->isTravelling());

        $response = $this
            ->actingAs($user)
            ->post(route('pigeon.get-news', $news2));

        $response->assertForbidden();
    }

    public function test_a_pigeon_cannot_get_a_news_without_user_coords(): void
    {
        $user = User::factory()->create();
        $user2 = User::factory()->create();
        $news = News::factory(
            [
                'user_id' => $user2->id,
            ]
        )->create();

        $response = $this
            ->actingAs($user)
            ->post(route('pigeon.get-news', $news));

        $response->assertSessionHasErrors(['lat', 'lng']);
    }

    public function test_a_pigeon_can_get_a_news_if_not_travelling(): void
    {
        $user = User::factory()->create();
        $user2 = User::factory()->create();
        $news = News::factory(
            [
                'user_id' => $user2->id,
            ]
        )->create();

        $response = $this
            ->actingAs($user)
            ->post(route('pigeon.get-news', $news), [
                'lat' => 0,
                'lng' => 0,
            ]);

        $response->assertRedirect(route('news.index'));
        $this->assertTrue($user->pigeon->isTravelling());
    }
}
