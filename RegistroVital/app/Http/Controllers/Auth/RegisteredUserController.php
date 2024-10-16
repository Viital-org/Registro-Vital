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
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Usuario::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'tipo_usuario' => ['required', 'integer','in:1,2']
        ]);

        $user = Usuario::create([
            'nome_completo' => $request->name,
            'email' => $request->email,
            'senha' => Hash::make($request->password),
            'tipo_usuario'=>$request->tipo_usuario
        ]);

        event(new Registered($user));


        switch ($user->role) {
            case 'paciente':
                Paciente::create([
                    'user_id' => $user->id,
                    'nome' => $user->name,
                    'email' => $user->email,
                ]);
                break;

            case 'medico':
                Profissional::create([
                    'user_id' => $user->id,
                    'nome' => $user->name,
                    'email' => $user->email,
                ]);
                break;

            case 'administrador':
                Administrador::create([
                    'user_id' => $user->id,
                    'nome' => $user->name,
                    'email' => $user->email,
                ]);
                break;
        }

        Auth::login($user);

        switch ($user->role) {
            case 'medico':
                return redirect(route('medico.dashboard'));
            case 'administrador':
                return redirect(route('admin.dashboard'));
            default:
                return redirect()->intended(route('paciente.dashboard'));
        }
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }
}
