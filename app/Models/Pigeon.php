<?php

namespace App\Models;

use App\Models\User;
use App\Models\PigeonMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        return $this->belongsToMany(News::class, 'pigeon_messages')->using(PigeonMessage::class);
    }    

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id'
    ];
}
