<?php

namespace App\Data;

use App\Models\PigeonMessage;
use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class PigeonMessageData extends Data
{
    public function __construct(
        public int $id,
        public int $pigeon_id,
        public int $news_id,
        public Carbon $arrival_date,
        public bool $is_arrived,
    ) {
    }

    public static function fromModel(PigeonMessage $pigeonMessage): self
    {
        return new self(
            $pigeonMessage->id,
            $pigeonMessage->id,
            $pigeonMessage->news_id,
            $pigeonMessage->arrival_date,
            $pigeonMessage->isArrived()
        );
    }
}
