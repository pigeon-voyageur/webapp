<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pigeon extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'pigeon_messages')
            ->as('message')
            ->withPivot(['id', 'arrival_date'])
            ->using(PigeonMessage::class);
    }

    public function isTravelling(): bool
    {
        return $this->news()->wherePivot('arrival_date', '>=', now())->count();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
    ];
}
