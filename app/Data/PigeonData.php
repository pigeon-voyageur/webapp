<?php

namespace App\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class PigeonData extends Data
{
    public function __construct(
        public int    $id,
        public int    $user_id,
        public Carbon $created_at,
        public Carbon $update_at
    )
    {
    }
}
