<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /** @use HasFactory<\Database\Factories\GameFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'synopsis',
        'developer',
        'publisher',
        'release_year',
        'genre_id',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function reviews() 
    {
    return $this->hasMany(Review::class);
    }

}
