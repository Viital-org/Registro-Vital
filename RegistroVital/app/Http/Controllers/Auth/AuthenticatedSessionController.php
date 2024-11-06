<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Usuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @throws ValidationException
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Tentar buscar o usuário pelo e-mail
        $usuario = Usuario::where('email', $request->input('email'))->first();

        // Verifica se o usuário existe e está bloqueado
        if ($usuario && $usuario->situacao_cadastro === 0) {
            return back()->withErrors([
                'email' => 'Não foi possível realizar o login, usuário bloqueado.',
            ]);
        }

        // Autentica o usuário
        $request->authenticate();

        // Regenera a sessão
        $request->session()->regenerate();

        // Log de sucesso de login
        Log::channel('auth')->info('Usuário ID: ' . Auth::id() . ' fez login no sistema', [
            'user_id' => Auth::id(),
            'action' => 'Login',
            'ip' => request()->ip(),
            'timestamp' => now(),
        ]);

        // Redireciona de acordo com o tipo de usuário
        switch ($request->user()->tipo_usuario) {
            case 2:
                return redirect()->intended(route('profissional.dashboard'));
            case 3:
                return redirect()->intended(route('administrador.dashboard'));
            default:
                return redirect()->intended(route('paciente.dashboard'));
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $userId = Auth::id();

        Log::channel('auth')->info('Usuário ID: ' . $userId . ' fez logout do sistema', [
            'user_id' => $userId,
            'action' => 'Logout',
            'ip' => request()->ip(),
            'timestamp' => now(),
        ]);

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
