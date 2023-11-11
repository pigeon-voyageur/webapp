<?php

namespace Tests\Feature\News;

use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsDeletionTest extends TestCase
{
    use RefreshDatabase;

    public function test_cannot_delete_when_guest(): void
    {
        $user = User::factory()->create();
        $news = News::factory(
            [
                'user_id' => $user->id,
            ]
        )->create();

        $response = $this->delete(route('news.destroy', $news), []);

        $response->assertRedirect(route('login'));
        $this->assertDatabaseCount(News::class, 1);
    }

    public function test_can_delete_if_author_of_the_news(): void
    {
        $user = User::factory()->create();
        $user2 = User::factory()->create();
        $news = News::factory(
            [
                'user_id' => $user->id,
            ]
        )->create();
        $user2->pigeon->news()->attach($news, ['arrival_date' => now()]);

        $response = $this->actingAs($user)->delete(route('news.destroy', $news));

        $response->assertFound();
        $this->assertDatabaseCount(News::class, 0);
    }

    public function test_cannot_delete_if_not_author_of_the_news(): void
    {
        $user = User::factory()->create();
        $author = User::factory()->create();
        $news = News::factory(
            [
                'user_id' => $author->id,
            ]
        )->create();

        $response = $this->actingAs($user)->delete(route('news.destroy', $news));

        $response->assertForbidden();
        $this->assertDatabaseCount(News::class, 1);
    }
}
