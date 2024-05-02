<?php

namespace App\Http\Controllers;

use App\Models\TipoAnotacao;
use Illuminate\Http\Request;

class TipoAnotacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoanotacao = TipoAnotacao::all();
        return view('Cadastros/listatipoanotacoes', ['tipoanotacao' => $tipoanotacao]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TipoAnotacao::create($request->all());
        return redirect()->route('tipoanotacao-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Cadastros/cadastrotipoanotacoes');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoAnotacao $tipoAnotacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Tipoanotacao = TipoAnotacao::find($id);
        return view('Cadastros/editartipoanotacao', ['Tipoanotacao' => $Tipoanotacao]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tipodeanotacao = TipoAnotacao::findorfail($id);
        $tipodeanotacao->update($request->all());
        return redirect()->route('tipoanotacao-index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tipodeanotacao = TipoAnotacao::findorfail($id);
        $tipodeanotacao->delete();
        return redirect()->route('tipoanotacao-index');
    }
}
