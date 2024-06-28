<?php

namespace App\Http\Controllers;

use App\Models\Anotacaosaude;
use App\Models\Paciente;
use App\Models\TipoAnotacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnotacoesSaudeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $paciente = Paciente::where('user_id', $user->id)->first();

        $anotacoessaude = Anotacaosaude::where('paciente_id', $paciente->id)
            ->join('tipoanotacoes', 'tipoanotacoes.id', '=', 'anotacoessaude.tipo_anot')
            ->select('anotacoessaude.*', 'tipoanotacoes.tipo_anotacao as tipo_anotacao', 'tipoanotacoes.desc_anotacao as desc_anotacao')
            ->simplePaginate(5);

        return view('Cadastros/listaranotacoessaude', ['anotacoessaude' => $anotacoessaude]);
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
            'tipo_anot' => 'required|exists:tipoanotacoes,id',
            'visibilidade' => 'required|in:Visivel,Escondido',
        ]);

        $validated['paciente_id'] = $paciente->id;

        Anotacaosaude::create($validated);
        return redirect()->route('anotacoessaude-index')->with('success', 'Anotação criada com sucesso!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoanotacoes = TipoAnotacao::all();

        return view('Cadastros/cadastroanotacoessaude', [
            'tipoanotacoes' => $tipoanotacoes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user();
        $paciente = Paciente::where('user_id', $user->id)->first();
        $anotacaosaude = Anotacaosaude::where('paciente_id', $paciente->id)->findOrFail($id);
        $tipoanotacoes = TipoAnotacao::all();

        return view('Cadastros/editaranotacoessaude', [
            'anotacaosaude' => $anotacaosaude,
            'tipoanotacoes' => $tipoanotacoes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $paciente = Paciente::where('user_id', $user->id)->first();
        $anotacaosaude = Anotacaosaude::where('paciente_id', $paciente->id)->findOrFail($id);

        $validated = $request->validate([
            'anotacao' => 'required|string',
            'data_anotacao' => 'required|date',
            'tipo_anot' => 'required|exists:tipoanotacoes,id',
            'visibilidade' => 'required|in:Visivel,Escondido',
        ]);

        $anotacaosaude->update($validated);
        return redirect()->route('anotacoessaude-index')->with('success', 'Anotação atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $paciente = Paciente::where('user_id', $user->id)->first();
        $anotacaosaude = Anotacaosaude::where('paciente_id', $paciente->id)->findOrFail($id);

        $anotacaosaude->delete();
        return redirect()->route('anotacoessaude-index')->with('success', 'Anotação deletada com sucesso!');
    }
}
