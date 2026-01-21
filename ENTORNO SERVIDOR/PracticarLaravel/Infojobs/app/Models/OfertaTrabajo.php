<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertaTrabajo extends Model
{
    /** @use HasFactory<\Database\Factories\OfertaTrabajoFactory> */
    use HasFactory;

    protected $fillable = [
        'empresa_id',
        'titulo',
        'descripcion',
        'ubicacion',
    ];

    function empresa() 
    {
        return $this->belongsTo(Empresa::class);
    }

    function user()
    {
        return $this->belongsToMany(User::class, 'candidatos');
    }

}
