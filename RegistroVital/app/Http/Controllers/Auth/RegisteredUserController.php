<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Administrador;
use App\Models\Paciente;
use App\Models\Profissional;
use App\Models\Usuario;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Processar a solicitação de registro.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validação dos dados
        $request->validate([
            'nome_completo' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:40', 'unique:' . Usuario::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'tipo_usuario' => ['required', 'integer', 'in:1,2,3'],
        ]);

        // Criação do usuário
        $user = Usuario::create([
            'nome_completo' => $request->nome_completo,
            'email' => $request->email,
            'senha' => $request->password,
            'tipo_usuario' => $request->tipo_usuario,
        ]);

        // Dispara o evento de registro
        event(new Registered($user));

        // Relacionamento com o tipo de usuário
        switch ($user->tipo_usuario) {
            case 1: // Paciente
                Paciente::create(['usuario_id' => $user->id]);
                break;
            case 2: // Profissional
                Profissional::create(['usuario_id' => $user->id]);
                break;
            case 3: // Administrador
                Administrador::create(['usuario_id' => $user->id]);
                break;
        }

        // Autentica o usuário após o registro
        Auth::login($user);

        // Redirecionamento com base no tipo de usuário
        return match ($user->tipo_usuario) {
            2 => redirect()->route('profissional.dashboard'), // Profissional
            3 => redirect()->route('administrador.dashboard'), // Administrador
            default => redirect()->intended(route('paciente.dashboard')), // Paciente
        };
    }

    /**
     * Exibir a página de registro.
     */
    public function create(): View
    {
        return view('auth.register');
    }
}
