<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{


    public function register()
    {

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password'),
        ]);
        
        return response()->json([
            'message' => 'Usuario ' . $user->name . ' registrado exitosamente',
        ], 201);

    }


    public function login(AuthRequest $request)
    {

        $request->validated();
        if (!Auth::attempt($request->validated())) {
            return response()->json([
                'message' => 'Lo siento mucho me he equiovocado',
            ], 400);
        }

        $user = Auth::user();
        $token = $user->createToken('Token para' . $user->email, ['*'], expiresAt: now()->addMonth(1));
        
        return response()->json([
            'message' => 'Inicio de sesión exitoso',
            'token' => $token->plainTextToken,
        ], 200);

    }

    public function logout()
    {

        Auth::user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Cierre de sesión exitoso',
        ], 200);

    }

}
