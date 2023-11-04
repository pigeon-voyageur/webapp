<?php

namespace Tests\Feature\Town;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TownViewingTest extends TestCase
{
    use RefreshDatabase;

    public function test_cannot_view_when_guest(): void
    {
        $response = $this->get(route('town.show'));

        $response->assertRedirect(route('login'));
    }

    public function test_redirect_to_create_when_no_town_joined(): void
    {
        $user = User::factory()
            ->create();

        $response = $this->actingAs($user)->get(route('town.show'));

        $response->assertRedirect(route('town.create'));
    }

    public function test_can_view_when_town_joined(): void
    {
        $user = User::factory()
            ->forTown()
            ->create();

        $response = $this->actingAs($user)->get(route('town.show'));

        $response->assertOk();
    }
}
