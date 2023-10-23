<?php

namespace App\Data;

use App\Models\Pigeon;
use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class PigeonData extends Data
{
    public function __construct(
        public int $id,
        public int $user_id,
        public Carbon $created_at,
        public Carbon $updated_at,
        public bool $is_travelling,
    ) {
    }

    public static function fromModel(Pigeon $pigeon): self
    {
        return new self(
            $pigeon->id,
            $pigeon->user_id,
            $pigeon->created_at,
            $pigeon->updated_at,
            $pigeon->isTravelling(),
        );
    }
}
