<?php

namespace Tests\Feature\News;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsCreationTest extends TestCase
{
    use RefreshDatabase;

    public function test_cannot_create_when_guest(): void
    {
        $response = $this->post(route('news.store'), []);

        $response->assertRedirect(route('login'));
        $this->assertDatabaseCount(News::class, 0);
    }

    public function test_can_create_when_logged(): void
    {
        $user = User::factory()->create();
        $newsCategory = NewsCategory::factory()->create();

        $response = $this->actingAs($user)->post(route('news.store'), [
            'title' => 'Lorem',
            'user_id' => $user->id,
            'summary' => 'LOrem ipsum',
            'news_category_id' => $newsCategory->id,
            'sources' => [
                [
                    'label' => 'Example',
                    'url' => 'https://example.com',
                ],
            ],
            'lat' => 0.1,
            'lng' => 0.1,
        ]);

        $response->assertRedirect(route('news.index'));
        $this->assertDatabaseCount(News::class, 1);
    }
}
