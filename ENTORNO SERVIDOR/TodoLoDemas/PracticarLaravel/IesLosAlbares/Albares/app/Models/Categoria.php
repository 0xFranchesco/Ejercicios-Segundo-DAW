<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    /** @use HasFactory<\Database\Factories\CategoriaFactory> */
    use HasFactory;

     protected $fillable = [
        'nombre',
    ];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'categoria_curso');
    }

}
