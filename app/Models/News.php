<?php

namespace App\Models;

use App\Models\Pigeon;
use App\Models\PigeonMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    use HasFactory;

    public function pigeon(): BelongsToMany
    {
        return $this->belongsToMany(Pigeon::class, 'pigeon_messages')->using(PigeonMessage::class);
    }

    public $fillable = [
        'title',
        'summary',
        'video',
        'lat',
        'lng',
        'sources',
    ];

    protected $casts = [
        'sources' => 'array'
    ];
}
