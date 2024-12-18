<?php

namespace App\Http\Controllers;

use App\Models\Anotacaosaude;
use App\Models\Paciente;
use App\Models\TipoAnotacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AnotacoesSaudeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
<<<<<<< HEAD
        if ($user->role === 'paciente') {
            $paciente = Paciente::where('user_id', $user->id)->first();
            $anotacoessaude = Anotacaosaude::where('paciente_id', $paciente->id)
                ->join('tipoanotacoes', 'tipoanotacoes.id', '=', 'anotacoessaude.tipo_anot')
                ->select('anotacoessaude.*', 'tipoanotacoes.tipo_anotacao as tipo_anotacao', 'tipoanotacoes.desc_anotacao as desc_anotacao')
                ->simplePaginate(5);
        } else if ($user->role === 'medico') {
=======

        if ($user->tipo_usuario === 1) {
            $paciente = Paciente::where('usuario_id', $user->id)->first();

            $anotacoessaude = Anotacaosaude::where('paciente_id', $user->id)
                ->join('tipos_anotacao', 'tipos_anotacao.id', '=', 'anotacoes.tipo_anotacao')
                ->join('tipos_visibilidade', 'tipos_visibilidade.id', '=', 'anotacoes.tipo_visibilidade')
                ->select('anotacoes.*', 'tipos_anotacao.id as tipo_anotacao', 'anotacoes.descricao_anotacao as anotacao', 'tipos_anotacao.descricao_tipo as desc_anotacao', 'tipos_visibilidade.descricao as visibilidade')
                ->simplePaginate(5);
        } else if ($user->tipo_usuario === '2') {
>>>>>>> develop
            return redirect()->route('welcome')->with('error', 'Você não tem permissão para acessar esta pagina.');
        } else {
            return redirect()->route('welcome')->with('error', 'Você não tem permissão para acessar esta pagina.');
        }

        return view('Anotacoes.listaranotacoessaude', ['anotacoessaude' => $anotacoessaude]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $paciente = Paciente::where('user_id', $user->id)->first();

        $validated = $request->validate([
            'anotacao' => 'required|string',
            'data_anotacao' => 'required|date',
<<<<<<< HEAD
            'tipo_anot' => 'required|exists:tipoanotacoes,id',
            'visibilidade' => 'required|in:Visivel,Escondido',
        ]);

        $validated['paciente_id'] = $paciente->id;
=======
            'tipo_anot' => 'required|exists:tipos_anotacao,id',
            'visibilidade' => 'required|in:1,2',
        ]);

        $validated['paciente_id'] = $paciente->usuario_id;
        $validated['descricao_anotacao'] = $request->anotacao;
        $validated['tipo_anotacao'] = $request->tipo_anot;
        $validated['data_anotacao'] = $request->data_anotacao;
        $validated['tipo_visibilidade'] = $request->visibilidade;
>>>>>>> develop


        $tipoAnotacao = TipoAnotacao::find($validated['tipo_anotacao']);
        $nomeTipoAnotacao = $tipoAnotacao ? $tipoAnotacao->descricao_tipo : 'Tipo não encontrado';

        $tipoVisibilidade = ($validated['tipo_visibilidade'] == 1) ? 'Público' : 'Privado';


        Log::channel('user_activity')->info('Usuário ID: ' . Auth::id() . ' cadastrou anotação com tipo ' . $nomeTipoAnotacao . ' e visibilidade ' . $tipoVisibilidade, [
            'user_id' => Auth::id(),
            'action' => 'Cadastro de Anotação',
            'tipo_anotacao' => $nomeTipoAnotacao,
            'tipo_visibilidade' => $tipoVisibilidade,
            'ip' => request()->ip(),
            'timestamp' => now(),
        ]);

        Anotacaosaude::create($validated);
        return redirect()->route('anotacoessaude-index')->with('success', 'Anotação criada com sucesso!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoanotacoes = TipoAnotacao::all();

        Log::channel('aceeso_anotacao')->info('Usuário ID: ' . Auth::id() . ' acessou a tela', [
            'user_id' => Auth::id(),
            'action' => 'Acesso',
            'ip' => request()->ip(),
            'timestamp' => now(),
        ]);

        return view('Anotacoes.cadastroanotacoessaude', [
            'tipoanotacoes' => $tipoanotacoes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user();
        $paciente = Anotacaosaude::where('paciente_id', $user->id)->first();
        $anotacaosaude = Anotacaosaude::where('id', $id)->first();
        $tipoanotacoes = TipoAnotacao::select('id', 'descricao_tipo')->get();

        return view('anotacoes/editaranotacoessaude', [
            'anotacaosaude' => $anotacaosaude,
            'tipoanotacoes' => $tipoanotacoes,

        ]);
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $paciente = Paciente::where('usuario_id', $user->id)->first();
        $anotacaosaude = Anotacaosaude::where('id', $id)->first();

        $validated = $request->validate([
            'anotacao' => 'required|string',
            'data_anotacao' => 'required|date',
            'tipo_anot' => 'required|exists:tipos_anotacao,id',
            'visibilidade' => 'required|in:1,2',
        ]);

        $validated['paciente_id'] = $paciente->usuario_id;
        $validated['descricao_anotacao'] = $request->anotacao;
        $validated['tipo_anotacao'] = $request->tipo_anot;
        $validated['data_anotacao'] = $request->data_anotacao;
        $validated['tipo_visibilidade'] = $request->visibilidade;


        $anotacaosaude->update($validated);
        return redirect()->route('anotacoessaude-index')->with('success', 'Anotação atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $paciente = Paciente::where('usuario_id', $user->id)->first();
        $anotacaosaude = Anotacaosaude::where('id', $id)->first();

        $anotacaosaude->delete();
        return redirect()->route('anotacoessaude-index')->with('success', 'Anotação deletada com sucesso!');
    }
}

