<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(AuthRequest $request)
    {
        $validado = $request->validated();
        if (!Auth::attempt($validado)) {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }
        $auth = Auth::user();
        $token = $auth->createToken('API Token para ' . $auth->email)
            ->plainTextToken;

        return response()->json([

            'user' => $auth,
            'token' => $token
        ], 200);
    }

    
}
