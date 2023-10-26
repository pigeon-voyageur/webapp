<?php

namespace App\Exceptions\Computers\FlightDurationComputer;

use Exception;
use Throwable;

class MissingDistanceException extends Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct("Distance is required to compute duration", $code, $previous);
    }
}
