<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertaTrabajo extends Model
{
    /** @use HasFactory<\Database\Factories\OfertaTrabajoFactory> */
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'ubicacion',
        'empresa_id',
    ];

    function empresa() 
    {
        return $this->belongsTo(Empresa::class);
    }

}
