<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayoutDinamico
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $layout = 'LayoutsPadrao.inicio';
        if ($user) {
            if ($user->role === 'medico') {
                $layout = 'LayoutsPadrao.layoutmedico';
            } elseif ($user->role === 'paciente') {
                $layout = 'LayoutsPadrao.layoutpaciente';
            }
        }

        view()->share('layout', $layout);

        return $next($request);
    }
}
