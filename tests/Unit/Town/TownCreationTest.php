<?php

namespace Tests\Unit\Town;

use App\Models\Town;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TownCreationTest extends TestCase
{
    use RefreshDatabase;

    public function test_join_code_is_created_for_new_town(): void
    {
        $town = Town::create();

        $this->assertNotNull($town->join_code);
    }
}
