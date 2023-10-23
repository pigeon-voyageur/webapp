<?php

namespace App\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class PigeonMessageData extends Data
{
    public function __construct(
        public int $id,
        public int $pigeon_id,
        public int $news_id,
        public Carbon $arrival_date,
        public PigeonData|Optional $pigeon,
        public NewsData|Optional $news,
    ) {
    }
}
