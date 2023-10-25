<?php

namespace App\Data;

use App\Models\News;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class LinkRowData extends Data
{
    public function __construct(
        public string $label,
        public string $url,
    ) {
    }

}
