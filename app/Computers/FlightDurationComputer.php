<?php

namespace App\Computers;

use App\Exceptions\Computers\FlightDurationComputer\MissingDistanceException;

class FlightDurationComputer
{
    protected const METERS_IN_KM = 1_000;
    protected const MINUTES_IN_HOUR = 60;

    protected const EARTH_KM_CIRCUMFERENCE = 40_070;

    protected const MAX_METER_DISTANCE_ON_EARTH = self::EARTH_KM_CIRCUMFERENCE * self::METERS_IN_KM / 2;
    protected const MIN_METER_DISTANCE_ON_EARTH = 0;

    protected const MIN_DURATION_IN_MINUTES = 10;
    protected const MAX_DURATION_IN_MINUTES = 4 * self::MINUTES_IN_HOUR;

    protected ?float $distanceInMeter = null;

    public function __construct()
    {
    }

    public function forKmDistance($kmDistance): self
    {
        $this->distanceInMeter = $kmDistance * self::METERS_IN_KM;

        return $this;
    }

    protected function checkMissingDistance(): void
    {
        if ($this->distanceInMeter === null) {
            throw new MissingDistanceException();
        }
    }

    public function getDurationInMinutes(): float
    {
        $this->checkMissingDistance();

        $b = self::MIN_DURATION_IN_MINUTES;
        $a = (self::MAX_DURATION_IN_MINUTES - self::MIN_DURATION_IN_MINUTES) / (self::MAX_METER_DISTANCE_ON_EARTH - self::MIN_METER_DISTANCE_ON_EARTH);
        $x = $this->distanceInMeter;

        return $a * $x + $b;
    }
}
