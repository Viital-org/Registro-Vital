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
        // Define layout padrão
        $layout = 'LayoutsPadrao.inicio';

        // Verifica se o usuário está autenticado
        if (Auth::check()) {
            $user = Auth::user();

            // Escolhe o layout com base no tipo de usuário
            switch ($user->tipo_usuario) {
                case 1: // Paciente
                    $layout = 'LayoutsPadrao.layoutpaciente';
                    break;
                case 2: // Profissional
                    $layout = 'LayoutsPadrao.layoutmedico';
                    break;
                case 3: // Administrador
                    $layout = 'LayoutsPadrao.layoutadministrador';
                    break;
            }
        }

        // Compartilha a variável 'layout' com as views
        view()->share('layout', $layout);

        return $next($request);
    }
}
