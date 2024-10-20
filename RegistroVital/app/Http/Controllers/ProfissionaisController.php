<?php

namespace App\Http\Controllers;

use App\Models\AtuaArea;
use App\Models\Especializacao;
use App\Models\Profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            ->simplePaginate(5);
        // ->get();

        return view('Cadastros/listaprofissionais', ['profissionais' => $profissionais]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'areaatuacao_id' => 'required|exists:atuaareas,id',
            'especializacao_id' => 'nullable|exists:especializacoes,id',
            'enderecoatuacao' => 'required|string|max:255',
            'localformacao' => 'required|string|max:255',
            'dataformacao' => 'required|date',
            'descricaoperfil' => 'required|string|max:255',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['nome'] = Auth::user()->name;
        $validated['email'] = Auth::user()->email;

        Profissional::create($validated);

        return redirect()->route('medico.dashboard')->with('success', 'Profissional cadastrado com sucesso!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $atuaareas = AtuaArea::all();
        $especializacoes = collect();

        if (request()->has('areaatuacao_id')) {
            $areaId = request('areaatuacao_id');
            $especializacoes = Especializacao::where('area_id', $areaId)->get();
        }

        return view('Cadastros/cadastroprofissional', [
            'user' => $user,
            'atuaareas' => $atuaareas,
            'especializacoes' => $especializacoes
        ]);
    }

    public function especializacoesPorArea($areaId)
    {
        $especializacoes = Especializacao::where('area_id', $areaId)->get();
        return response()->json($especializacoes);
    }

    /**
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
    public function edit()
    {
        $user = Auth::user();
        $profissionais = Profissional::where('user_id', $user->id)->firstOrFail();
        $atuaareas = AtuaArea::all();

        return view('Cadastros.editarprofissional', [
            'profissionais' => $profissionais,
            'atuaareas' => $atuaareas,
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $profissionais = Profissional::where('user_id', $user->id)->firstOrFail();

        $validated = $request->validate([
            'areaatuacao_id' => 'required|exists:atua_areas,id',
            'especializacao_id' => 'nullable|exists:especializacoes,id',
            'enderecoatuacao' => 'required|string|max:255',
            'localformacao' => 'required|string|max:255',
            'dataformacao' => 'required|date',
            'descricaoperfil' => 'required|string|max:255',
        ]);

        $profissionais->update($validated);

        return redirect()->route('medico.dashboard')->with('success', 'Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $profissional = Profissional::findOrFail($id);
        $profissional->delete();
        return redirect()->route('profissionais-index')->with('success', 'Profissional deletado com sucesso!');
    }

    public function tela()
    {
        return view('profile.profissional-dashboard');
    }
}
