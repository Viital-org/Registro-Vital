<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\RedefinicaoDeSenha;
use App\Models\Usuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
    }

    public function enviaEmail(Request $request)
    {
        $usuarioInfo = Usuario::where('email', $request->email)->first();

        $novaSenha = Usuario::resetaSenha($usuarioInfo->email);

        if ($usuarioInfo) {
            Mail::to($usuarioInfo->email, $usuarioInfo->nome_completo)
                ->send(new RedefinicaoDeSenha([
                    'destinatario' => $usuarioInfo->email,
                    'from' => 'no-reply@registrovital.com.br',
                    'novaSenha' => $novaSenha,
                    'nomeUsuario' => $usuarioInfo->nome_completo,
                ]));

        } else {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }
    }
}
