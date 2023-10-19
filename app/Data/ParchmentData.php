<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class ParchmentData extends Data
{
    public function __construct(
        public int $id,
        public string $title,
        public string $summary,
        public ?string $video,
        public float $lat,
        public float $lng,
    ) {
    }
}
