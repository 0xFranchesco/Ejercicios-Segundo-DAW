<?php

namespace App\Http\Controllers;

use App\Models\Consola;
use Illuminate\Http\Request;

class ConsolaController extends Controller
{
   
    public function index()
    {
        return Consola::all();
    }

    public function show(Consola $consola)
    {
        return $consola;
    }

    public function store(Request $request)
    {
        $consola = Consola::create(request()->all());
        return $consola;
    }

    public function update(Consola $consola)
    {
        $consola->update(request()->all());
        return $consola;
    }

    public function destroy(Consola $consola)
    {
        if ($consola) {
            $consola->delete();
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
