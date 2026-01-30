<?php

namespace App\Http\Controllers;

use App\Models\Especulador;
use App\Models\Zulo;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Throwable;

class ZuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zulos = Zulo::all();
        return view('zulos.index', compact('zulos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('zulos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $especulador_id = Especulador::inRandomOrder()->first()->id;
        Zulo::create($request->all(), compact('especulador_id'));
        return redirect('/zulos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Zulo $zulo)
    {
        return view('zulos.show', [
            'zulo' => $zulo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Zulo $zulo)
    {
        try {
            return view('zulos.edit');
        }catch (Throwable){
            abort(501);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            return view('zulos.edit');
        }catch (Throwable){
            abort(501);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            return view('zulos.edit');
        }catch (Throwable){
            abort(501);
        }
    }
}
