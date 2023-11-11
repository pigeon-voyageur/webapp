<?php

namespace Tests\Feature\News;

use App\Models\News;
use App\Models\Town;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsViewingTest extends TestCase
{
    use RefreshDatabase;

    public function test_cannot_view_all_when_guest(): void
    {
        $response = $this->get(route('news.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_can_view_all_when_logged(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('news.index'));

        $response->assertOk();
    }

    public function test_cannot_view_when_guest(): void
    {
        $user = User::factory()->create();
        $news = News::factory(
            [
                'user_id' => $user->id,
            ]
        )->create();

        $response = $this->get(route('news.show', $news));

        $response->assertRedirect(route('login'));
    }

    public function test_user_cannot_view_the_news_if_the_pigeon_didnt_arrived_with(): void
    {
        $user = User::factory()->create();
        $user2 = User::factory()->create();
        $news = News::factory(
            [
                'user_id' => $user2->id,
            ]
        )->create();

        $response = $this->actingAs($user)->get(route('news.show', $news));

        $response->assertForbidden();
    }

    public function test_can_view_pigeon_bring_the_news(): void
    {
        $user = User::factory()->create();
        $user2 = User::factory()->create();
        $news = News::factory(
            [
                'user_id' => $user2->id,
            ]
        )->create();
        $user->pigeon->news()->attach($news, ['arrival_date' => now()->subSecond()]);

        $response = $this->actingAs($user)->get(route('news.show', $news));
        $user->refresh();

        $response->assertOk();
        $this->assertTrue($user->pigeon->news()->find($news)->message->is_read);
    }

    public function test_can_view_when_author_of_the_news(): void
    {
        $user = User::factory()->create();
        $news = News::factory(
            [
                'user_id' => $user->id,
            ]
        )->create();

        $response = $this->actingAs($user)->get(route('news.show', $news));

        $response->assertOk();
    }

    public function test_can_view_when_author_of_the_news_is_in_same_town(): void
    {
        $town = Town::factory()->create();
        $author = User::factory()->for($town)->create();
        $news = News::factory(
            [
                'user_id' => $author->id,
            ]
        )->create();
        $user = User::factory()->for($town)->create();

        $response = $this->actingAs($user)->get(route('news.show', $news));

        $response->assertOk();
    }
}
