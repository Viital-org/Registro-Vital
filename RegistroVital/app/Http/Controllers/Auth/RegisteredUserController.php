<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
=======
use App\Models\Administrador;
use App\Models\AtuaArea;
use App\Models\Endereco;
use App\Models\Especializacao;
>>>>>>> develop
use App\Models\Paciente;
use App\Models\Profissional;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        // Validação dos dados
        $request->validate([
<<<<<<< HEAD
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
=======
            'nome_completo' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:40', 'unique:' . Usuario::class],
            'cpf' => ['required', 'string', 'size:11', 'unique:' . Paciente::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'tipo_usuario' => ['required', 'integer', 'in:1,2,3'],
        ]);

        // Criação do usuário
        $user = Usuario::create([
            'nome_completo' => $request->nome_completo,
            'email' => $request->email,
            'senha' => $request->password,
            'tipo_usuario' => $request->tipo_usuario,
>>>>>>> develop
        ]);

        // Dispara o evento de registro
        event(new Registered($user));

<<<<<<< HEAD

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
=======
        // Relacionamento com o tipo de usuário
        switch ($user->tipo_usuario) {
            case 1: // Paciente
                Paciente::create([
                    'usuario_id' => $user->id,
                    'cpf' => $request->cpf,
                    'data_nascimento' => $request->data_nascimento,
                    'estado_civil' => $request->estado_civil,
                    'genero' => $request->genero,
                    'bairro' => $request->bairro,
                    'rua_endereco' => $request->rua,
                    'numero_endereco' => $request->numero,
                    'cep' => $request->cep,
                    'cidade' => $request->cidade,
                    'estado' => $request->estado,
                ]);
                break;
            case 2: // Profissional
                Profissional::create([
                    'usuario_id' => $user->id,
                    'genero' => $request->genero,
                    'cpf' => $request->cpf,
                    'cnpj' => $request->cnpj,
                    'registro_profissional' => $request->registro_profissional,
                    'tempo_experiencia' => $request->tempo_experiencia,
                    'area_atuacao_id' => $request->area_atuacao_id,
                    'especializacao_id' => $request->especializacao_id
                ]);
                break;
            case 3: // Administrador
                Administrador::create(['usuario_id' => $user->id]);
                break;
>>>>>>> develop
        }

        Endereco::create([
            'usuario_id' => $user->id,
            'situacao_endereco' => '1',
            'cep' => $request->cep,
            'rua' => $request->rua,
            'complemento' => $request->complemento,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'uf' => $request->uf,
            'numero_endereco' => $request->numero,
        ]);

        // Autentica o usuário após o registro
        Auth::login($user);

<<<<<<< HEAD
        if ($request->User()->role === 'medico') {
            return redirect(route('medico.dashboard'));
        }
        return redirect()->intended(route('paciente.dashboard'));
=======
        \Flasher\Toastr\Prime\toastr()->addSuccess('Registro realizado com sucesso');

        // Redirecionamento com base no tipo de usuário
        return match ($user->tipo_usuario) {
            2 => redirect()->route('profissional.dashboard')->with('Registro realizado com sucesso'), // Profissional
            3 => redirect()->route('administrador.dashboard')->with('Registro realizado com sucesso'), // Administrador
            default => redirect()->intended(route('paciente.dashboard'))->with('Registro realizado com sucesso'), // Paciente
        };

>>>>>>> develop
    }

    public function create(): View
    {
        $areasAtuacao = AtuaArea::all();
        return view('auth.register', compact('areasAtuacao'));
    }

    public function getEspecializacoes($area_atuacao_id): JsonResponse
    {
        $especializacoes = Especializacao::where('area_atuacao_id', $area_atuacao_id)->get();
        return response()->json($especializacoes);

    }

    public function bloquearUsuario($id)
    {
        $usuario = Usuario::findOrFail($id);

        $usuario->situacao_cadastro = $usuario->situacao_cadastro === 1 ? 0 : 1;
        $usuario->save();

        $mensagem = $usuario->situacao_cadastro === 1 ? 'Usuário desbloqueado com sucesso!' : 'Usuário bloqueado com sucesso!';

        return redirect()->back()->with('success', $mensagem);
    }
}
