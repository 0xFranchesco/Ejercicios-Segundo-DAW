<?php

namespace App\Http\Controllers;

use App\Models\PerfilProfesor;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profesores = Profesor::with('perfilProfesor')->get();
        return view('profesores.index', compact('profesores'));
    }

    public function experimentados()
    {
        $profesores = \App\Models\Profesor::query()
            ->with('perfilProfesor')
            ->whereHas('perfilProfesor', function ($q) {
                $q->where('experiencia_anios', '>=', 25);
            })
            ->get();

        return view('profesores.index', compact('profesores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profesores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $profesor = Profesor::create($request->only([
            'nombre',
            'email',
        ]));
        $profesor->perfilProfesor()->create($request->only([
            'biografia',
            'experiencia_anios',
        ]));
        return redirect()->route('profesores.show', $profesor);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profesor $profesor)
    {
        return view('profesores.show', [
            'profesor' => Profesor::find($profesor)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profesor $profesor)
    {
        return view('profesores.edit', compact('profesor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profesor $profesor)
    {
        $profesor->update($request->all());

        if ($profesor->perfilProfesor) {
            $profesor->perfilProfesor->update($request->only([
                'biografia',
                'experiencia_anios',
            ]));
        }

        return redirect()->route('profesores.show', $profesor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
