<?php

namespace App\Http\Controllers;

use App\Models\AgendamentoPaciente;
use Illuminate\Http\Request;

class AgendamentoPacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendamento_paciente = AgendamentoPaciente::join('especializacoes', 'agendamentos.especializacao_id', '=', 'especializacoes.id')
            ->join('pacientes', 'agendamentos.paciente_id', '=', 'pacientes.id')
            ->join('profissionais', 'agendamentos.profissional_id', '=', 'profissionais.id')
            ->Join('consultas', 'agendamentos.consulta_id', '=', 'consultas.id')
            ->select('consultas.*', 'especializacoes.especializacao as tipo_especializacao', 'pacientes.nome as nome_paciente', 'profissionais.nome as nome_profissional', 'consultas.id', 'consultas.data as data_consulta')
            ->orderBy('agendamentos.id')
            ->get();
        return view('Cadastros/listaagendamentopaciente', ['agendamento_paciente' => $agendamento_paciente]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agendamento_paciente = Agendamento::all();
        return view('Cadastros/cadastroagendamentos', ['agendamento-paciente' => $agendamento_paciente]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->input('id');


        if ($id === null) {
            $agendamento_paciente = Agendamento::join('especializacoes', 'agendamentos.especializacao_id', '=', 'especializacoes.id')
                ->join('pacientes', 'agendamentos.paciente_id', '=', 'pacientes.id')
                ->join('profissionais', 'agendamentos.profissional_id', '=', 'profissionais.id')
                ->Join('consultas', 'agendamentos.consulta_id', '=', 'consultas.id')
                ->select('consultas.*', 'especializacoes.especializacao as tipo_especializacao', 'pacientes.nome as nome_paciente', 'profissionais.nome as nome_profissional', 'consultas.id', 'consultas.data as data_consulta')
                ->orderBy('agendamentos.id')
                ->get();
        } else {
            $agendamento_paciente = Agendamento::join('especializacoes', 'agendamentos.especializacao_id', '=', 'especializacoes.id')
                ->join('pacientes', 'agendamentos.paciente_id', '=', 'pacientes.id')
                ->join('profissionais', 'agendamentos.profissional_id', '=', 'profissionais.id')
                ->Join('consultas', 'agendamentos.consulta_id', '=', 'consultas.id')
                ->where('agendamentos.id', '=', $id)
                ->select('consultas.*', 'especializacoes.especializacao as tipo_especializacao', 'pacientes.nome as nome_paciente', 'profissionais.nome as nome_profissional', 'consultas.id', 'consultas.data as data_consulta')
                ->orderBy('agendamentos.id')
                ->get();
        }
        return view('Cadastros/listaagendamentopaciente', ['agendamento-paciente' => $agendamento_paciente]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $agendamentos_paciente = Agendamento::findorfail($id);
        $agendamentos_paciente->delete();
        return redirect()->route('agendamento-paciente');
    }
}
