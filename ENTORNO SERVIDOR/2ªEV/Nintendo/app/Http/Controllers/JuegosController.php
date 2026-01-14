<?php

namespace App\Http\Controllers;

use App\Models\Juegos;
use Illuminate\Http\Request;

class JuegosController extends Controller
{
    
    public function index()
    {
        return Juegos::all();
    }

     
    public function show(Juegos $juego)
    {
        return $juego;
    }

    public function store(Request $request)
    {
        $juego = Juegos::create(request()->all());
        return $juego;
    }

    public function update(Juegos $juego)
    {
        $juego->update(request()->all());
        return $juego;
    }

    public function destroy(Juegos $juego)
    {
        
        if ($juego) {
            $juego->delete();
            return response()->json([
            'mensaje' => 'Borrao pescao'
        ]);
        }else {
            return response()->json([
            'mensaje' => 'Error al eliminarlo'
            ], 404);
        }
    }
    

}
