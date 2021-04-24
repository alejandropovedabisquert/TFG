<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if (Auth::check() && $user->role == 1) {
            return $next($request);
        } else {
            $titulo = 'Permiso denegado';
            $mensaje = 'No tiene permisos de administrador';
            return response()->view('restricciones.authorize', compact('mensaje', 'titulo'));
        }
    }
}
