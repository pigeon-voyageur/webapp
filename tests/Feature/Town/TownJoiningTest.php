<?php

namespace Tests\Feature\Town;

use App\Models\Town;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TownJoiningTest extends TestCase
{
    use RefreshDatabase;

    public function test_cannot_join_when_guest(): void
    {
        $town = Town::factory()->create();

        $response = $this->get(route('town.join', ['town' => $town, 'join_code' => $town->join_code]));

        $response->assertRedirect(route('login'));
        $this->assertDatabaseCount(Town::class, 1);
    }

    public function test_cannot_join_another_town(): void
    {
        $user = User::factory()
            ->forTown()
            ->create();
        $anotherTown = Town::factory()->create();

        $response = $this->actingAs($user)->get(route('town.join', ['town' => $anotherTown, 'join_code' => $anotherTown->join_code]));

        $this->assertDatabaseCount(Town::class, 2);
        $this->assertNotNull($user->town);
        $response->assertForbidden();
    }

    public function test_cannot_join_when_full(): void
    {
        $fullTown = Town::factory()
            ->hasUsers(config('town.max_citizen'))
            ->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('town.join', ['town' => $fullTown, 'join_code' => $fullTown->join_code]));

        $this->assertDatabaseCount(Town::class, 1);
        $this->assertNull($user->town);
        $response->assertForbidden();
    }

    public function test_can_join_when_user_has_not_a_town(): void
    {
        $town = Town::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('town.join', ['town' => $town, 'join_code' => $town->join_code]));
        $user->refresh();

        $this->assertDatabaseCount(Town::class, 1);
        $this->assertNotNull($user->town);
        $response->assertRedirect(route('town.show'));
    }

    public function test_can_join_actual_town(): void
    {
        $town = Town::factory()->create();
        $user = User::factory()
            ->for($town)
            ->create();

        $response = $this->actingAs($user)->get(route('town.join', ['town' => $town, 'join_code' => $town->join_code]));
        $user->refresh();

        $this->assertDatabaseCount(Town::class, 1);
        $this->assertNotNull($user->town);
        $response->assertRedirect(route('town.show'));
    }
}
