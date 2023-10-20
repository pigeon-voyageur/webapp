<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'sources' => 'array'
    ];
}
