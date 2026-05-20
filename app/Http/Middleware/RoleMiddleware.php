<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $rol): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (auth()->user()->rol->descripcion != $rol) {

            abort(403, 'NO TIENES PERMISOS');
        }

        return $next($request);
    }
}