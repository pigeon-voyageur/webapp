<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PigeonMessage extends Pivot
{
    use HasFactory;

    protected $table = 'pigeon_messages';

    public $fillable = [
        'arrival_date',
    ];

    protected $casts = [
        'arrival_date' => 'date',
    ];
    
    public $incrementing = true;
}
