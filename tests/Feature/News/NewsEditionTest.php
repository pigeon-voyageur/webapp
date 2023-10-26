<?php

namespace Tests\Feature\News;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsEditionTest extends TestCase
{
    use RefreshDatabase;

    public function test_cannot_edit_when_quest(): void
    {
        $news = News::factory()->create();
        $newsSummary = $news->summary;

        $response = $this->patch(route('news.update', $news), []);
        $news->refresh();

        $response->assertRedirect(route('login'));
        $this->assertEquals($news->summary, $newsSummary);
    }

    public function test_can_edit_when_logged(): void
    {
        $user = User::factory()->create();
        $news = News::factory()->create();
        $newsCategory = NewsCategory::factory()->create();

        $newNewsData = [
            'title' => 'Lorem',
            'summary' => 'LOrem ipsum that should be stored',
            'news_category_id' => $newsCategory->id,
            'sources' => [
                [
                    'label' => 'Example',
                    'url' => 'https://example.com',
                ],
            ],
            'lat' => 0.1,
            'lng' => 0.1,
        ];

        $response = $this->actingAs($user)->patch(route('news.update', $news), $newNewsData);
        $news->refresh();

        $response->assertRedirect(route('news.index'));
        $this->assertEquals($news->summary, $newNewsData['summary']);
    }
}
