<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Administrador;
use App\Models\AtuaArea;
use App\Models\Especializacao;
use App\Models\Paciente;
use App\Models\Profissional;
use App\Models\Usuario;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        // Validação dos dados
        $request->validate([
            'nome_completo' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:40', 'unique:' . Usuario::class],
            'cpf'=>['required','string','size:11', 'unique:'. Paciente::class],
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
                Paciente::create([
                    'usuario_id' => $user->id,
                    'cpf' => $request->cpf,
                    'data_nascimento'=> $request->data_nascimento,
                    'estado_civil'=> $request->estado_civil,
                    'genero'=>$request->genero,
                    'bairro'=>$request->bairro,
                    'rua_endereco'=>$request->rua,
                    'numero_endereco'=>$request->numero,
                    'cep'=>$request->cep,
                    'cidade'=>$request->cidade,
                    'estado'=>$request->estado,
                ]);
                break;
            case 2: // Profissional
                Profissional::create([
                    'usuario_id' => $user->id,
                    'genero'=>$request->genero,
                    'cpf' => $request->cpf,
                    'cnpj'=>$request->cnpj,
                    'registro_profissional'=>$request->registro_profissional,
                    'tempo_experiencia'=>$request->tempo_experiencia,
                    'area_atuacao_id'=>$request->area_atuacao_id,
                    'especializacao_id'=>$request->especializacao_id
                ]);
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
}
