<?php

namespace App\Computers;

use App\Exceptions\Computers\FlightDistanceComputer\MissingFromCoordinateException;
use App\Exceptions\Computers\FlightDistanceComputer\MissingToCoordinateException;

class FlightDistanceComputer
{
    protected const KM_IN_MILE = 1.609344;
    protected const METERS_IN_KM = 1_000;
    protected const MINUTES_IN_DEGREE = 60;
    protected const STATUTE_MILES_IN_NAUTICAL_MILE = 1.1515;

    protected ?float $fromLat = null;
    protected ?float $fromLng = null;

    protected ?float $toLat = null;
    protected ?float $toLng = null;

    public function __construct()
    {
    }

    public function from(float $lat, float $lng): self
    {
        $this->fromLat = $lat;
        $this->fromLng = $lng;

        return $this;
    }

    public function to(float $lat, float $lng): self
    {
        $this->toLat = $lat;
        $this->toLng = $lng;

        return $this;
    }

    protected function checkMissingCoordinates(): void
    {
        if ($this->fromLng === null || $this->fromLat === null) {
            throw new MissingFromCoordinateException();
        }

        if ($this->toLng === null || $this->toLat === null) {
            throw new MissingToCoordinateException();
        }
    }

    public function getDistanceInMiles(): float
    {
        $this->checkMissingCoordinates();

        if (($this->fromLat === $this->toLat) && ($this->fromLng === $this->toLng)) {
            return 0;
        }

        $theta = $this->fromLng - $this->toLng;
        $dist = sin(deg2rad($this->fromLat)) * sin(deg2rad($this->toLat)) + cos(deg2rad($this->fromLat)) * cos(deg2rad($this->toLat)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);

        return $dist * self::MINUTES_IN_DEGREE * self::STATUTE_MILES_IN_NAUTICAL_MILE;
    }

    public function getDistanceInKm(): float
    {
        return $this->getDistanceInMiles() * self::KM_IN_MILE;
    }
}
