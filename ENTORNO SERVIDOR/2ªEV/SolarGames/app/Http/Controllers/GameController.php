<?php

namespace App\Http\Controllers;

use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
     public function index()
    {
        $filter = request()->input('filter', []);
        $games = Game::filter($filter)->get();
        return GameResource::collection($games);
    }

     public function show(Game $game)
    {
        return new GameResource($game);
    }

    public function store(Request $request)
    {
        $game = Game::create($request->all());
        return new GameResource($game);
    }

    public function update(Game $game)
    {
        $game->update(request()->all());
        return new GameResource($game);
    }

    public function destroy(Game $game)
    {

        if ($game) {
            $game->delete();
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
