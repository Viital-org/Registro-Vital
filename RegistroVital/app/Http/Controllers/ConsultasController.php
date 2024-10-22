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
        $today = date('Y-m-d');

        if ($user->role === 'paciente') {
            $consultas = Consulta::where('paciente_id', $user->paciente->id)
                ->where('situacao', '!=', 'cancelada')
                ->where('data', '>=', $today)
                ->paginate(5);
        } elseif ($user->role === 'medico') {
            $consultas = Consulta::where('profissional_id', $user->profissional->id)
                ->where('situacao', '!=', 'cancelada')
                ->where('data', '>=', $today)
                ->paginate(5);
        } else {
            $consultas = Consulta::whereRaw('1=0')->paginate(5); ;
        }

        Consulta::where('data', '<', $today)
            ->where('situacao', 1)
            ->update(['situacao' => 2]);

        return view('consultas.listaconsultas', compact('consultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $consulta = Consulta::findOrFail($id);

        if ($user->role === 'paciente' && $user->paciente->id === $consulta->paciente_id) {
            $consulta->update($request->validate([
                'situacao' => 'required|in:confirmado(a),cancelado(a)',
            ]));

            return redirect()->route('consultas.index', $consulta->id)->with('success', 'Status atualizado com sucesso!');
        }

        return redirect()->route('consultas.index')->with('error', 'Você não tem permissão para atualizar esta consulta.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'data' => 'required|date|after_or_equal:today',
            'situacao' => 'required|string|max:255',
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
        $user = Auth::user();

        if (($user->role === 'medico' && $consulta->profissional_id !== $user->profissional->id) ||
            ($user->role === 'paciente' && $consulta->paciente_id !== $user->paciente->id)) {
            return redirect()->route('welcome')->with('error', 'Você não tem permissão para acessar esta página.');
        }

        return view('consultas.showconsultas', compact('consulta'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $consulta = Consulta::findOrFail($id);
        $user = Auth::user();

        if (($user->role === 'medico' && $consulta->profissional_id !== $user->profissional->id) ||
            ($user->role === 'paciente' && $consulta->paciente_id !== $user->paciente->id)) {
            return redirect()->route('welcome')->with('error', 'Você não tem permissão para acessar esta página.');
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
        $user = Auth::user();

        if ($user->role === 'medico' && $consulta->profissional_id !== $user->profissional->id) {
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
