<?php

namespace App\Http\Controllers;

use App\Http\Resources\JuegosResource;
use App\Models\Juegos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JuegosController extends Controller
{
    
    public function index()
    {
        return response()->json(
            JuegosResource::collection(Juegos::all())
        );
        //o tambnien directamente return JuegosResource::collection(Juegos::all());
    }

     
    public function show(Juegos $juego)
    {
        return new JuegosResource($juego);
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

    public function byAuthUser()
    {
        $user = Auth::user();
        return $user->juegos;
    }
    

}
