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
        $especializacoes = Especializacao::leftJoin('atuaareas', 'especializacoes.area_id', '=', 'atuaareas.id')
            ->select('especializacoes.*', 'atuaareas.area')
            ->orderBy('especializacoes.created_at')
            ->simplePaginate(5);
        return view('Cadastros/listaespecializacoes', ['especializacoes' => $especializacoes]);
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
        $atuaareas = AtuaArea::all();
        return view('Cadastros/cadastroespecializacoes', ['atuaareas' => $atuaareas]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->input('id');

        if ($id === null) {
            $especializacoes = Especializacao::leftJoin('atuaareas', 'especializacoes.area_id', '=', 'atuaareas.id')
                ->select('especializacoes.*', 'atuaareas.area')
                ->orderBy('especializacoes.created_at')
                ->get();
        } else {
            $especializacoes = Especializacao::leftJoin('atuaareas', 'especializacoes.area_id', '=', 'atuaareas.id')
                ->where('especializacoes.id', '=', $id)
                ->select('especializacoes.*', 'atuaareas.area')
                ->orderBy('especializacoes.created_at')
                ->get();

        }
        return view('Cadastros/listaespecializacoes', ['especializacoes' => $especializacoes]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $especializacao = Especializacao::find($id);
        $atuaareas = AtuaArea::all();
        return view('Cadastros/editarespecializacao', ['especializacoes' => $especializacao, 'atuaareas' => $atuaareas]);
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

    public function getByArea($areaId)
    {
        $especializacoes = Especializacao::where('area_id', $areaId)->get();
        return response()->json($especializacoes);
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
