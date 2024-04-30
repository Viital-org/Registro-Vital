<?php

namespace App\Http\Controllers;

use App\Models\Especializacao;
use Illuminate\Http\Request;

class EspecializacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $especializacoes = Especializacao::all();
        return view('Cadastros/listaespecializacoes', compact('especializacoes'), ['especializacoes' => $especializacoes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Cadastros/cadastroespecializacoes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Especializacao::create($request->all());
        return redirect()->route('especializacoes-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Especializacao $especializacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $especializacao = Especializacao::find($id);
        return view('Cadastros/editarespecializacao', compact('especializacao'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $especializacao = Especializacao::findorfail($id);
        $especializacao->update($request->all());
        return redirect()->route('especializacoes-index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $especializacao = Especializacao::findorfail($id);
        $especializacao->delete();
        return redirect()->route('especializacoes-index');
    }
}
