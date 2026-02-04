<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    /** @use HasFactory<\Database\Factories\ProfesorFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
        'email',
    ];

    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }

    public function perfilProfesor()
    {
        return $this->hasOne(PerfilProfesor::class);
    }

}
