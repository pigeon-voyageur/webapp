<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'news_category_id',
        'summary',
        'lat',
        'lng',
        'sources',
        'resources',
    ];

    protected $casts = [
        'sources' => 'array',
        'resources' => 'array',
    ];

    public function pigeon(): BelongsToMany
    {
        return $this->belongsToMany(Pigeon::class, 'pigeon_messages')
            ->as('message')
            ->withPivot(['id', 'arrival_date'])
            ->using(PigeonMessage::class);
    }

    public function newsCategory(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class);
    }

}
