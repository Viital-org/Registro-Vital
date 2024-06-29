<?php

namespace App\Http\Controllers;

use App\Models\Anotacaosaude;
use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'medico') {
            $consultas = Consulta::where('profissional_id', $user->profissional->id)
                ->with(['profissional', 'paciente'])
                ->orderBy('data', 'desc')
                ->simplePaginate(10);
        } else {
            $consultas = Consulta::where('paciente_id', $user->paciente->id)
                ->with(['profissional', 'paciente'])
                ->orderBy('data', 'desc')
                ->simplePaginate(10);
        }


        return view('consultas.listaconsultas', compact('consultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'data' => 'required|date|after_or_equal:today',
            'status' => 'required|string|max:255',
            'profissional_id' => 'required|exists:profissionais,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'valor' => 'required|numeric',
        ]);

        Consulta::create($validated);

        return redirect()->route('consultas.index')->with('success', 'Consulta criada com sucesso!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profissionais = Profissional::all();
        $pacientes = Paciente::all();
        return view('consultas.cadastroconsultas', compact('profissionais', 'pacientes'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $consulta = Consulta::with(['profissional', 'paciente'])->findOrFail($id);


        if ((Auth::user()->role === 'medico' && $consulta->profissional_id !== Auth::user()->profissional->id) ||
            (Auth::user()->role === 'paciente' && $consulta->paciente_id !== Auth::user()->paciente->id)) {
            return redirect()->route('welcome')->with('error', 'Você não tem permissão para acessar esta pagina.');
        }


        return view('consultas.showconsultas', compact('consulta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $consulta = Consulta::findOrFail($id);


        if ((Auth::user()->role === 'medico' && $consulta->profissional_id !== Auth::user()->profissional->id) ||
            (Auth::user()->role === 'paciente' && $consulta->paciente_id !== Auth::user()->paciente->id)) {
            return redirect()->route('welcome')->with('error', 'Você não tem permissão para acessar esta pagina.');
        }

        $consulta->update($request->all());
        return redirect()->route('consultas.index')->with('success', 'Consulta atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $consulta = Consulta::findOrFail($id);


        if ((Auth::user()->role === 'medico' && $consulta->profissional_id !== Auth::user()->profissional->id) ||
            (Auth::user()->role === 'paciente' && $consulta->paciente_id !== Auth::user()->paciente->id)) {
            return redirect()->route('welcome')->with('error', 'Você não tem permissão para acessar esta pagina.');
        }

        $consulta->delete();
        return redirect()->route('consultas.index')->with('success', 'Consulta deletada com sucesso!');
    }

    /**
     * Listar anotações do paciente para o médico.
     */
    public function listAnotacoes($id)
    {
        $consulta = Consulta::findOrFail($id);


        if (Auth::user()->role === 'medico' && $consulta->profissional_id !== Auth::user()->profissional->id) {
            return redirect()->route('welcome')->with('error', 'Você não tem permissão para acessar esta página.');
        }

        $anotacoessaude = Anotacaosaude::where('paciente_id', $consulta->paciente_id)
            ->where('visibilidade', 'Visivel')
            ->join('tipoanotacoes', 'tipoanotacoes.id', '=', 'anotacoessaude.tipo_anot')
            ->select('anotacoessaude.*', 'tipoanotacoes.tipo_anotacao as tipo_anotacao', 'tipoanotacoes.desc_anotacao as desc_anotacao')
            ->simplePaginate(5);

        return view('Anotacoes.listaanotacoesmedico', compact('anotacoessaude', 'consulta'));
    }
}

