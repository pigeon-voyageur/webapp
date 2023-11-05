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
        public string $join_code,
        #[DataCollectionOf(UserData::class)]
        public DataCollection $users,
    ) {
    }

    public static function fromModel(Town $town): self
    {
        return new self(
            $town->id,
            $town->join_code,
            UserData::collection($town->users),
        );
    }
}
