<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilProfesor extends Model
{
    /** @use HasFactory<\Database\Factories\PerfilProfesorFactory> */
    use HasFactory;

    protected $fillable = [
        'biografia',
        'experiencia_anios',

    ];

    
    public function profesor()
    {
        return $this->belongTo(Profesor::class);
    }

}
