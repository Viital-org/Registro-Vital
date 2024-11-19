<?php

namespace App\Http\Controllers;

use App\Models\AtuaArea;
use App\Models\Especializacao;
use Illuminate\Http\Request;

class EspecializacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $especializacoes = Especializacao::with('area')
            ->orderBy('created_at')
            ->simplePaginate(5);

        return view('Cadastros/listaespecializacoes', compact('especializacoes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = ($request->validate([
            'area_atuacao_id' => 'required|integer',
            'descricao_especializacao' => 'required|string|max:60',
        ]));

        Especializacao::create($validated);

        return redirect()->route('especializacoes-create')->with('success', 'Especialização criada com sucesso!');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areasAtuacao = AtuaArea::all();
        return view('Cadastros/cadastroespecializacoes', compact('areasAtuacao'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $buscaespec = $request->input('search_id');
        $especializacoes = Especializacao::with('area')
            ->when($buscaespec, fn($query) => $query->where('descricao_especializacao', 'like', '%' . $buscaespec . '%'))
            ->orderBy('created_at')
            ->simplePaginate(5);

        return view('Cadastros.listaespecializacoes', compact('especializacoes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $especializacoes = Especializacao::find($id);
        $atuaareas = AtuaArea::all();
        return view('Cadastros/editarespecializacao', compact('especializacoes', 'atuaareas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $especializacao = Especializacao::findOrFail($id);
        $especializacao->update($request->all());
        return redirect()->route('especializacoes-index');
    }

    public function getByArea($areaId)
    {
        $especializacoes = Especializacao::where('area_atuacao_id', $areaId)->get();
        return response()->json($especializacoes);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $especializacao = Especializacao::findOrFail($id);
        $especializacao->delete();
        return redirect()->route('especializacoes-index')->with('success', 'Especialização excluída com sucesso.');
    }
}
