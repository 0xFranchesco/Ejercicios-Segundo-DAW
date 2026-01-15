<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return Review::all();
    }

    public function show(Review $review)
    {
        return $review;
    }

    public function store(Request $request)
    {
        $review = Review::create($request->all());
        return $review;
    }

    public function update(Review $review)
    {
        $review->update(request()->all());
        return $review;
    }

    public function destroy(Review $review)
    {

        if ($review) {
            $review->delete();
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
