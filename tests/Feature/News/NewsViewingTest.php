<?php

namespace Tests\Feature\News;

use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
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

        $response->assertStatus(Response::HTTP_OK);
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

    public function test_user_cannot_view_the_news_if_the_pigeon_didnt_arrived(): void
    {
        $user = User::factory()->create();
        $user2 = User::factory()->create();
        $news = News::factory(
            [
                'user_id' => $user2->id,
            ]
        )->create();

        $response = $this->actingAs($user)->get(route('news.show', $news));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    public function test_can_view_when_logged_and_pigeon_got_the_news(): void
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

        $response->assertStatus(Response::HTTP_OK);
        $this->assertTrue($user->pigeon->news()->find($news)->message->is_read);
    }

    public function test_can_view_when_logged_and_author_of_the_news(): void
    {
        $user = User::factory()->create();
        $news = News::factory(
            [
                'user_id' => $user->id,
            ]
        )->create();

        $response = $this->actingAs($user)->get(route('news.show', $news));

        $response->assertStatus(Response::HTTP_OK);
    }
}
