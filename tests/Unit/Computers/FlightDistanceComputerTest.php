<?php

namespace Tests\Unit\Computers;

use App\Computers\FlightDistanceComputer;
use App\Exceptions\Computers\FlightDistanceComputer\MissingFromCoordinateException;
use App\Exceptions\Computers\FlightDistanceComputer\MissingToCoordinateException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FlightDistanceComputerTest extends TestCase
{
    use RefreshDatabase;

    public function test_compute_distance_need_from_coordinates(): void
    {
        $distanceComputer = resolve(FlightDistanceComputer::class);

        // near Bordeaux
        $toLat = 44.902577996288876;
        $toLng = -0.5279735021276792;

        $this->assertThrows(function () use ($distanceComputer, $toLat, $toLng) {
            $distanceComputer
                ->to($toLat, $toLng)
                ->getDistanceInKm();
        }, MissingFromCoordinateException::class);
    }

    public function test_compute_distance_need_to_coordinates(): void
    {
        $distanceComputer = resolve(FlightDistanceComputer::class);

        // near Paris
        $fromLat = 48.828565527993234;
        $fromLng = 2.3379773699808766;

        $this->assertThrows(function () use ($distanceComputer, $fromLat, $fromLng) {
            $distanceComputer
                ->from($fromLat, $fromLng)
                ->getDistanceInKm();
        }, MissingToCoordinateException::class);
    }

    public function test_compute_distance(): void
    {
        $distanceComputer = resolve(FlightDistanceComputer::class);

        // near Paris
        $fromLat = 48.828565527993234;
        $fromLng = 2.3379773699808766;

        // near Bordeaux
        $toLat = 44.902577996288876;
        $toLng = -0.5279735021276792;

        $kmDistance = $distanceComputer
            ->from($fromLat, $fromLng)
            ->to($toLat, $toLng)
            ->getDistanceInKm();

        $this->assertEquals(487.79032338741337, $kmDistance);
    }
}
