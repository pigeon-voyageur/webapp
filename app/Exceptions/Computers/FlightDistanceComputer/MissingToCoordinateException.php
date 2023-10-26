<?php

namespace App\Exceptions\Computers\FlightDistanceComputer;

use Exception;
use Throwable;

class MissingToCoordinateException extends Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct("To coordinate are required to compute distance", $code, $previous);
    }
}
