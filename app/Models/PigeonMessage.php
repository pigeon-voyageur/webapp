<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PigeonMessage extends Pivot
{
    use HasFactory;

    // public function pigeon(): BelongsTo
    // {
    //     return $this->belongsTo(Pigeon::class);
    // }

    // public function news(): BelongsTo
    // {
    //     return $this->belongsTo(News::class);
    // }

    public $fillable = [
        'arrival_date'
    ];

    public $incrementing = true;
}
