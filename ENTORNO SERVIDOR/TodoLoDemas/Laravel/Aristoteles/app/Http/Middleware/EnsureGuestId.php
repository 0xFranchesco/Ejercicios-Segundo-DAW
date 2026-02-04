<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class EnsureGuestId
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()) {

            $gid = $request->cookie('guest_id');

            if (!$gid || !is_string($gid) || strlen($gid) < 20) {
                $gid = (string) Str::uuid();

                cookie()->queue(cookie(
                    name: 'guest_id',
                    value: $gid,
                    minutes: 60 * 24 * 30, // 30 días
                    path: '/',
                    domain: null,
                    secure: app()->environment('production'),
                    httpOnly: true,
                    raw: false,
                    sameSite: 'Lax'
                ));

            }

            Session::put('guest_id', $gid);
            // Lo guardamos en request para leerlo facil
            $request->attributes->set('guest_id', $gid);
        }

        return $next($request);
    }
}
