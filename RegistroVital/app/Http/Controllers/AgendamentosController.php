<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Consulta;
use App\Models\Especializacao;
use App\Models\Profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $today = date('Y-m-d');

        if ($user->role === 'paciente') {
            $agendamentos = Agendamento::where('paciente_id', $user->paciente->id)
                ->whereHas('consulta', function ($query) use ($today) {
                    $query->where('data', '<', $today)
                        ->orWhere('status', 'cancelada')
                        ->orWhere('status', 'realizada');
                })
                ->paginate(10);
        } elseif ($user->role === 'medico') {
            $agendamentos = Agendamento::where('profissional_id', $user->profissional->id)
                ->whereHas('consulta', function ($query) use ($today) {
                    $query->where('data', '<', $today)
                        ->orWhere('status', 'cancelada')
                        ->orWhere('status', 'realizada');
                })
                ->paginate(10);
        } else {
            $agendamentos = collect();
        }

        return view('agendamentos.listaagendamentos', compact('agendamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'especializacao_id' => 'required|exists:especializacoes,id',
            'profissional_id' => 'required|exists:profissionais,id',
            'data_agendamento' => 'required|date|after_or_equal:today',
        ]);

        $validated['paciente_id'] = Auth::user()->paciente->id;

        $consulta = Consulta::create([
            'data' => $validated['data_agendamento'],
            'status' => 'agendado',
            'profissional_id' => $validated['profissional_id'],
            'paciente_id' => $validated['paciente_id'],
            'valor' => 100.0,
        ]);

        $validated['consulta_id'] = $consulta->id;

        Agendamento::create($validated);

        return redirect()->route('consultas.index')->with('success', 'Agendamento criado com sucesso!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $especializacoes = Especializacao::all();
        return view('agendamentos.agendaconsulta', compact('especializacoes'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $agendamento->delete();
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento deletado com sucesso!');
    }

    /**
     * Get professionals based on specialization.
     */
    public function getProfissionaisByEspecializacao($especializacao_id)
    {
        $profissionais = Profissional::where('especializacao_id', $especializacao_id)->get();
        return response()->json($profissionais);
    }
}
