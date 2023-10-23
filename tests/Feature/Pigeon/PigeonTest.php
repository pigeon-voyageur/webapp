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

    public function test_a_pigeon_can_get_a_news(): void
    {
        $news = News::factory()->create();
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post(route('pigeon.get-news', $news));

        $response->assertRedirect(route('news.index'));
        $this->assertTrue($user->pigeon()->isTravelling());
    }
}
