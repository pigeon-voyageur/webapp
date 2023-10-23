<?php

namespace App\Data;

use App\Models\News;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class NewsData extends Data
{
    public function __construct(
        public int $id,
        public string $title,
        public string $summary,
        public ?string $video,
        public float $lat,
        public float $lng,
        /** @var String[] */
        public ?array $sources,
        public ?PigeonMessageData $message,
    ) {
    }

    public static function fromModel(News $news): self
    {
        return new self(
            $news->id,
            $news->title,
            $news->summary,
            $news->video,
            $news->lat,
            $news->lng,
            $news->sources,
            PigeonMessageData::optional($news->pivot),
        );
    }
}
