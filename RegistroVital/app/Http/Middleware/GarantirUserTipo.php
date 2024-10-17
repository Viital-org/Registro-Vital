<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GarantirUserTipo
{
    public function handle(Request $request, Closure $next, int $tipo_usuario): Response
    {
       $user = Auth::user();
        if (!$user || $user->tipo_usuario !== $tipo_usuario) {
            switch ($user->tipo_usuario) {
                case 1: // Paciente
                    return redirect()->route('paciente.dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
                case 2: // Profissional
                    return redirect()->route('profissional.dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
                case 3: // Administrador
                    return redirect()->route('admin.dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
                default:
                    return redirect()->route('login')->with('error', 'Por favor, faça login.');
            }
        }


        return $next($request);
    }
}

