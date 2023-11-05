<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Town extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'join_code',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    protected static function booted(): void
    {
        static::created(static function (Town $town) {
            $town->update([
                'join_code' => Str::orderedUuid(),
            ]);
        });
    }
}
