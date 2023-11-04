<?php

namespace Tests\Feature\Town;

use App\Models\Town;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TownLeavingTest extends TestCase
{
    use RefreshDatabase;

    public function test_cannot_leave_when_guest(): void
    {
        $response = $this->post(route('town.leave'));

        $response->assertRedirect(route('login'));
    }

    public function test_cannot_leave_if_no_town_joined(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('town.leave'));

        $response->assertForbidden();
    }

    public function test_can_leave_if_town_joined(): void
    {
        $town = Town::factory()->create();
        $userA = User::factory()
            ->for($town)
            ->create();

        $userB = User::factory()
            ->for($town)
            ->create();

        $response = $this->actingAs($userA)->post(route('town.leave'));
        $userA->refresh();

        $this->assertDatabaseCount(Town::class, 1);
        $this->assertNull($userA->town);
        $response->assertRedirect(route('news.index'));
    }

    public function test_delete_town_when_last_user_leaving(): void
    {
        $town = Town::factory()->create();
        $user = User::factory()
            ->for($town)
            ->create();

        $response = $this->actingAs($user)->post(route('town.leave'));
        $user->refresh();

        $this->assertDatabaseCount(Town::class, 0);
        $this->assertNull($user->town);
        $response->assertRedirect(route('news.index'));
    }
}
