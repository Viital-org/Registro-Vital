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
        $especializacoes = Especializacao::with('areaAtuacao')
            ->orderBy('created_at')
            ->simplePaginate(5);

        return view('Cadastros/listaespecializacoes', compact('especializacoes'));
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
        $id = $request->input('search_id');
        $especializacoes = Especializacao::with('areaAtuacao')
            ->when($id, fn($query) => $query->where('id', $id))
            ->orderBy('created_at')
            ->paginate(5);

        return view('Cadastros.listaespecializacoes', compact('especializacoes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $especializacao = Especializacao::find($id);
        $areasAtuacao = AtuaArea::all();
        return view('Cadastros/editarespecializacao', compact('especializacao', 'areasAtuacao'));
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
