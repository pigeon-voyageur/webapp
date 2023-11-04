<?php

namespace App\Data;

use App\Models\Town;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class TownData extends Data
{
    public function __construct(
        public int $id,
        #[DataCollectionOf(UserData::class)]
        public DataCollection $users,
    ) {
    }

    public static function fromModel(Town $town): self
    {
        return new self(
            $town->id,
            UserData::collection($town->users),
        );
    }
}
