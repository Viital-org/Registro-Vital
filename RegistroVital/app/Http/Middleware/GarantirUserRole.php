<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GarantirUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = Auth::user();

        if (!$user || $user->role !== $role) {

            if ($user && $user->role === 'medico') {
                return redirect()->route('medico.dashboard')->with('error', 'Você não tem permissão para acessar as paginas de paciente página.');
            } else {
                return redirect()->route('paciente.dashboard')->with('error', 'Você não tem permissão para acessar as paginas de medico página.');
            }
        }

        return $next($request);
    }
}
