<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\AtuaArea;
use App\Models\Especializacao;
use App\Models\Meta;
use App\Models\Paciente;
use App\Models\Profissional;
use App\Models\Usuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $paciente = $user->tipo_usuario === 1 ? Paciente::where('usuario_id', $user->id)->first() : null;
        $profissional = $user->tipo_usuario === 2 ? Profissional::where('usuario_id', $user->id)->first() : null;
        $metas = Meta::all();
        $atuaareas = AtuaArea::all();
        $especializacoes = Especializacao::all();

        return view('profile.edit', compact('user', 'paciente', 'profissional', 'metas', 'atuaareas', 'especializacoes'));
    }

    /**
     * Update the user's role-specific information.
     *
     */


    public function updateRoleInfo(Request $request): RedirectResponse
    {
        /** @var Usuario $user */

        $user = Auth::user();

        if ($user->tipo_usuario === 1) {
            $paciente = Paciente::where('usuario_id', $user->id)->first();
            $paciente->update($request->all());
        } elseif ($user->tipo_usuario === 2) {
            $profissional = Profissional::where('usuario_id', $user->id)->first();
            $profissional->update($request->all());
        }

        return Redirect::route('profile.edit')->with('status', 'role-info-updated');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        if ($user->tipo_usuario === 1) {
            $paciente = Paciente::where('usuario_id', $user->id)->first();
            if ($paciente) {
                $paciente->update([
                    'nome' => $request->name,
                    'email' => $request->email,
                ]);
            }
        } elseif ($user->tipo_usuario === 2) {
            $profissional = Profissional::where('usuario_id', $user->id)->first();
            if ($profissional) {
                $profissional->update([
                    'nome' => $request->name,
                    'email' => $request->email,
                ]);
            }
        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        if ($user->tipo_usuario === 1) {
            Paciente::where('usuario_id', $user->id)->delete();
        } elseif ($user->tipo_usuario === 2) {
            Profissional::where('usuario_id', $user->id)->delete();
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

