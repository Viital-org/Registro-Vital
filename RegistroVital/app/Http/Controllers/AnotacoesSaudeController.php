<?php

namespace App\Http\Controllers;

use App\Models\Anotacaosaude;
use App\Models\Paciente;
use App\Models\TipoAnotacao;
use Illuminate\Http\Request;

class AnotacoesSaudeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anotacoessaude = Anotacaosaude::join('pacientes', 'anotacoessaude.paciente_id', '=', 'pacientes.id')
            ->join('tipoanotacoes', 'tipoanotacoes.id', '=', 'anotacoessaude.tipo_anot')
            ->select('anotacoessaude.*', 'tipoanotacoes.tipo_anotacao as tipo_anotacao', 'tipoanotacoes.desc_anotacao as desc_anotacao', 'pacientes.nome as paciente')
            ->get();

        return view('Cadastros/listaranotacoessaude', ['anotacoessaude' => $anotacoessaude]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Anotacaosaude::create($request->all());
        return redirect()->route('anotacoessaude-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anotacoessaude = Anotacaosaude::all();
        $paciente = Paciente::all();
        $tipoanotacao = TipoAnotacao::all();
        return view('Cadastros/cadastroanotacoessaude', ['anotacoessaude' => $anotacoessaude, 'paciente' => $paciente, 'tipoanotacao' => $tipoanotacao]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Anotacaosaude $anotacaosaude)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $anotacaosaude = Anotacaosaude::find($id);
        $tipoanotacao = TipoAnotacao::all();
        $paciente = Paciente::all();
        return view('Cadastros/editaranotacoessaude', ['anotacaosaude' => $anotacaosaude, 'tipoanotacao' => $tipoanotacao, 'paciente' => $paciente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $anotacaosaude = Anotacaosaude::findorfail($id);
        $anotacaosaude->update($request->all());
        return redirect()->route('anotacoessaude-index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $anotacaosaude = Anotacaosaude::findorfail($id);
        $anotacaosaude->delete();
        return redirect()->route('anotacoessaude-index');
    }
}
