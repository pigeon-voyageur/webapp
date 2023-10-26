<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PigeonMessage extends Pivot
{
    use HasFactory;

    protected $table = 'pigeon_messages';

    public $fillable = [
        'arrival_date',
        'is_read',
    ];

    protected $casts = [
        'arrival_date' => 'datetime',
        'is_read' => 'boolean',
    ];

    public $incrementing = true;

    public function isArrived(): bool
    {
        return $this->arrival_date <= now();
    }

    public function pigeon(): BelongsTo
    {
        return $this->belongsTo(Pigeon::class);
    }

    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }

    public function scopeArrived(Builder $query): void
    {
        $query->where('arrival_date', '<=', now());
    }

    public function scopeRecentlyArrived(Builder $query): void
    {
        $query->arrived()->where('arrival_date', '>=', now()->subMinute());
    }
}
