<?php

namespace App\Data;

use App\Models\News;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class LightNewsData extends Data
{
    public function __construct(
        public int $id,
        public float $lat,
        public float $lng,
        public int $user_id
    ) {
    }

    public static function fromModel(News $news): self
    {
        return new self(
            $news->id,
            $news->lat,
            $news->lng,
            $news->user_id,
        );
    }
}
