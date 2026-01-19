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

    public function scopePopular($query)
    {
        return $query->withCount('reviews')->orderBy('reviews_count', 'desc');
    }

    public function scopeFilter($query, $filter)
    {
        $query
        ->when($filter['synopsis'] ?? false, function($query, $synopsis){
            $query->where('synopsis', 'LIKE', '%' . $synopsis . '%');
        })
        ->when($filter['developer'] ?? false, function($query, $developer){
                $query->where('developer', 'LIKE', '%' . $developer . '%');
        })
        ->when($filter['release_year'] ?? false, function($query, $release_year){
                $query->whereIn('release_year', explode(',' , $release_year));
        })
        ;

        return $query;
    }

}
