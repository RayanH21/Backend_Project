<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'content',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime', // Zorgt ervoor dat published_at als Carbon-object wordt behandeld
    ];
}

