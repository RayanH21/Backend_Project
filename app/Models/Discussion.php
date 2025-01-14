<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author_id',
    ];

    // Relatie met de gebruiker (auteur van de discussie)
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
