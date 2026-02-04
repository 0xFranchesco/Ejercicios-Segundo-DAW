<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juegos extends Model
{
    /** @use HasFactory<\Database\Factories\JuegosFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'developer',
        'release_year',
        'price',
        'consola_id',
    ];

    public function consola()
    {
        return $this->belongsTo(Consola::class);
    }

}
