<?php

namespace Tests\Unit\Computers;

use App\Computers\FlightDurationComputer;
use App\Exceptions\Computers\FlightDurationComputer\MissingDistanceException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FlightDurationComputerTest extends TestCase
{
    use RefreshDatabase;

    public function test_compute_need_distance(): void
    {
        $durationComputer = resolve(FlightDurationComputer::class);

        $this->assertThrows(function () use ($durationComputer) {
            $durationComputer
                ->getDurationInMinutes();
        }, MissingDistanceException::class);
    }

    public function test_should_return_10min_for_min_distance(): void
    {
        $durationComputer = resolve(FlightDurationComputer::class);

        $duration = $durationComputer
            ->forKmDistance(0)
            ->getDurationInMinutes();

        $this->assertEquals(10, $duration);
    }

    public function test_should_return_4h_for_max_distance_on_earth(): void
    {
        $durationComputer = resolve(FlightDurationComputer::class);
        $maxDistanceOnEarthInKm = 40070 / 2;

        $duration = $durationComputer
            ->forKmDistance($maxDistanceOnEarthInKm)
            ->getDurationInMinutes();

        $this->assertEquals(240, $duration);
    }
}
