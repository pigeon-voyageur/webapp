<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'summary',
        'video',
        'lat',
        'lng',
        'sources',
    ];
    
    protected $casts = [
        'sources' => 'array',
    ];

    public function pigeon(): BelongsToMany
    {
        return $this->belongsToMany(Pigeon::class, 'pigeon_messages')
            ->as('message')
            ->withPivot(['id', 'arrival_date'])
            ->using(PigeonMessage::class);
    }

}
