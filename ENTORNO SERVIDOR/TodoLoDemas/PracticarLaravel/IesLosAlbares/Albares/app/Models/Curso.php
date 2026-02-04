<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    /** @use HasFactory<\Database\Factories\CursoFactory> */
    use HasFactory;

     protected $fillable = [
        'titulo',
        'descripcion',
        'duracion_horas',
        'profesor_id',
    ];

    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_curso');
    }

}
