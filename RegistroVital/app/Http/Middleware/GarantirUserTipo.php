<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GarantirUserTipo
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, ...$tipos_usuario): Response
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Por favor, faça login.');
        }

        if (!in_array($user->tipo_usuario, $tipos_usuario)) {
            switch ($user->tipo_usuario) {
                case 1:
                    return redirect()->route('paciente.dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
                case 2:
                    return redirect()->route('profissional.dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
                case 3:
                    return redirect()->route('administrador.dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
            }
        }

        return $next($request);
    }

}
