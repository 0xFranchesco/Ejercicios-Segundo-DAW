<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consola extends Model
{
    /** @use HasFactory<\Database\Factories\ConsolaFactory> */
    use HasFactory;

    protected $fillable = [
        'model',
        'release_year',
        'price',
        'user_id',
    ];

    public function juegos()
    {
        return $this->hasMany(Juegos::class);
    }

}
