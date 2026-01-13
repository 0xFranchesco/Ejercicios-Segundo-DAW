<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;



class GenreController extends Controller
{
    public function index()
    {
        return Genre::all();
    }

    public function show(Genre $genre)
    {
        return $genre;
    }

    public function store(Request $request)
    {
        $genre = Genre::create($request->all());
        return $genre;
    }

    public function update(Genre $genre)
    {
        $genre->update(request()->all());
        return $genre;
    }

    public function destroy(Genre $genre)
    {

        if ($genre) {
            $genre->delete();
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
