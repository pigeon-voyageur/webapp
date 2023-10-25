<?php

namespace App\Data;

use App\Models\News;
use App\Data\LinkRowData;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class NewsData extends Data
{
    public function __construct(
        public int $id,
        public string $title,
        public string $summary,
        public float $lat,
        public float $lng,
        #[DataCollectionOf(LinkRowData::class)]
        public DataCollection $sources,
        public ?PigeonMessageData $message,
    ) {
    }

    public static function fromModel(News $news): self
    {
        return new self(
            $news->id,
            $news->title,
            $news->summary,
            $news->lat,
            $news->lng,
            LinkRowData::collection($news->sources),
            PigeonMessageData::optional($news->message),
        );
    }
}
