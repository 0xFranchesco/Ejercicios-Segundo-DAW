<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Http\Resources\GenreResource;
use App\Models\Game;
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

    public function store(GenreRequest $request)
    {
        $genre = Genre::create($request->validated());
        return $genre;
    }

    public function update(Genre $genre, GenreRequest $request)
    {
        $genre->update($request->validated());
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

    public function gameGenre(Game $game)
    {
        return new GenreResource($game->genre);
    }

}
