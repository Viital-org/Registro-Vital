<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use App\Models\Profissional;
use App\Models\User;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'in:paciente,medico'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        event(new Registered($user));


        if ($user->role === 'paciente') {
            Paciente::create([
                'user_id' => $user->id,
                'nome' => $user->name,
                'email' => $user->email,
            ]);
        } elseif ($user->role === 'medico') {
            Profissional::create([
                'user_id' => $user->id,
                'nome' => $user->name,
                'email' => $user->email,
            ]);
        }

        Auth::login($user);

        if ($request->User()->role === 'medico') {
            return redirect(route('medico.dashboard'));
        }
        return redirect()->intended(route('paciente.dashboard'));
    }
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }
}
