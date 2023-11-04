<?php

namespace Tests\Feature\Town;

use App\Models\Town;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TownCreationTest extends TestCase
{
    use RefreshDatabase;

    public function test_cannot_create_when_guest(): void
    {
        $response = $this->post(route('town.store'));

        $response->assertRedirect(route('login'));
        $this->assertDatabaseCount(Town::class, 0);
    }

    public function test_cannot_create_when_user_has_already_joined_a_town(): void
    {
        $user = User::factory()
            ->forTown()
            ->create();

        $response = $this->actingAs($user)->post(route('town.store'));

        $response->assertForbidden();
        $this->assertNotNull($user->town);
        $this->assertDatabaseCount(Town::class, 1);
    }

    public function test_can_create_then_join_when_user_has_not_a_town(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('town.store'));
        $user->refresh();

        $response->assertRedirect(route('town.show'));
        $this->assertNotNull($user->town);
        $this->assertDatabaseCount(Town::class, 1);
    }
}
