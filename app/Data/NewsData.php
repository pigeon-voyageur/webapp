<?php

namespace App\Data;

use App\Models\News;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class NewsData extends Data
{
    public function __construct(
        public int $id,
        public string $title,
        public int $news_category_id,
        public int $user_id,
        public NewsCategoryData $category,
        public string $summary,
        public float $lat,
        public float $lng,
        #[DataCollectionOf(LinkRowData::class)]
        public DataCollection $sources,
        #[DataCollectionOf(LinkRowData::class)]
        public DataCollection $resources,
        public ?PigeonMessageData $message,
    ) {
    }

    public static function fromModel(News $news): self
    {
        return new self(
            $news->id,
            $news->title,
            $news->news_category_id,
            $news->user_id,
            NewsCategoryData::from($news->newsCategory),
            $news->summary,
            $news->lat,
            $news->lng,
            LinkRowData::collection($news->sources),
            LinkRowData::collection($news->resources),
            PigeonMessageData::optional($news->message),
        );
    }
}
