<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PigeonTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_a_pigeon_is_created_with_an_user(): void
    {
        User::factory()->create();

        $this->assertDatabaseCount('users', 1);

        $this->assertDatabaseCount('pigeons', 1);
    }



}
