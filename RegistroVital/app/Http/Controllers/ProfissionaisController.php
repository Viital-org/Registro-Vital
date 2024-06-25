<?php

namespace App\Http\Controllers;

use App\Models\AtuaArea;
use App\Models\Especializacao;
use App\Models\Profissional;
use Illuminate\Http\Request;

class ProfissionaisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profissionais = Profissional::leftJoin('atuaareas', 'profissionais.areaatuacao_id', '=', 'atuaareas.id')
            ->leftJoin('especializacoes', 'profissionais.especializacao_id', '=', 'especializacoes.id')
            ->select('profissionais.*', 'atuaareas.area', 'especializacoes.especializacao')
            ->orderBy('profissionais.created_at')
            ->get();
        return view('Cadastros/listaprofissionais', ['profissionais' => $profissionais]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Profissional::create($request->all());
        return redirect()->route('profissionais-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $atuaareas = AtuaArea::all();
        $especializacoes = collect();
        if (request()->has('areaatuacao_id')) {
            $areaId = request('areaatuacao_id');
            $especializacoes = Especializacao::where('area_id', $areaId)->get();
        }

        return view('Cadastros/cadastroprofissional', ['atuaareas' => $atuaareas, 'especializacoes' => $especializacoes]);
    }

    public function especializacoesPorArea($areaId)
    {
        $especializacoes = Especializacao::where('area_id', $areaId)->get();
        return response()->json($especializacoes);
    }

    /*
     * Display the specified resource.
     */

    public function show(Request $request)
    {
        $id = $request->input('id');

        if ($id === null) {
            $profissionais = Profissional::leftJoin('atuaareas', 'profissionais.areaatuacao_id', '=', 'atuaareas.id')
                ->leftJoin('especializacoes', 'profissionais.especializacao_id', '=', 'especializacoes.id')
                ->select('profissionais.*', 'atuaareas.area', 'especializacoes.especializacao')
                ->orderBy('profissionais.created_at')
                ->get();
        } else {
            $profissionais = Profissional::leftJoin('atuaareas', 'profissionais.areaatuacao_id', '=', 'atuaareas.id')
                ->leftJoin('especializacoes', 'profissionais.especializacao_id', '=', 'especializacoes.id')
                ->where('profissionais.id', '=', $id)
                ->select('profissionais.*', 'atuaareas.area', 'especializacoes.especializacao')
                ->orderBy('profissionais.created_at')
                ->get();

        }
        return view('Cadastros/listaprofissionais', ['profissionais' => $profissionais]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $profissional = Profissional::find($id);
        $atuaareas = AtuaArea::all();
        $especializacoes = Especializacao::all();

        return view('Cadastros/editarprofissional', ['profissionais' => $profissional, 'atuaareas' => $atuaareas, 'especializacoes' => $especializacoes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $profissional = Profissional::findorfail($id);
        $profissional->update($request->all());
        return redirect()->route('profissionais-index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        {
            $profissional = Profissional::findorfail($id);
            $profissional->delete();
            return redirect()->route('profissionais-index');
        }
    }
    public function tela()
    {
        return view('profile.medico-dashboard');
    }
}
