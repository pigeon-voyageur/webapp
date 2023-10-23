<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PigeonMessage extends Pivot
{
    use HasFactory;

    protected $table = 'pigeon_messages';

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
