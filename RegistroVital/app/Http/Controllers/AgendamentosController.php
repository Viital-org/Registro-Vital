<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;

class AgendamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendamentos = Agendamento::join('especializacoes', 'agendamentos.especializacao_id', '=', 'especializacoes.id')
            ->join('pacientes', 'agendamentos.paciente_id', '=', 'pacientes.id')
            ->join('profissionais', 'agendamentos.profissional_id', '=', 'profissionais.id')
            ->Join('consultas', 'agendamentos.consulta_id', '=', 'consultas.id')
            ->select('consultas.*', 'especializacoes.especializacao as tipo_especializacao', 'pacientes.nome as nome_paciente', 'profissionais.nome as nome_profissional', 'consultas.id', 'consultas.data as data_consulta')
            ->orderBy('agendamentos.id')
            ->get();
        return view('Cadastros/listaagendamentos', ['agendamentos' => $agendamentos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agendamentos = Agendamento::all();
        return view('Cadastros/cadastroagendamentos', ['agendamentos' => $agendamentos]);
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
            $agendamentos = Agendamento::join('especializacoes', 'agendamentos.especializacao_id', '=', 'especializacoes.id')
            ->join('pacientes', 'agendamentos.paciente_id', '=', 'pacientes.id')
            ->join('profissionais', 'agendamentos.profissional_id', '=', 'profissionais.id')
            ->Join('consultas', 'agendamentos.consulta_id', '=', 'consultas.id')
            ->select('consultas.*', 'especializacoes.especializacao as tipo_especializacao', 'pacientes.nome as nome_paciente', 'profissionais.nome as nome_profissional', 'consultas.id', 'consultas.data as data_consulta')
            ->orderBy('agendamentos.id')
            ->get();
        } else{
            $agendamentos = Agendamento::join('especializacoes', 'agendamentos.especializacao_id', '=', 'especializacoes.id')
            ->join('pacientes', 'agendamentos.paciente_id', '=', 'pacientes.id')
            ->join('profissionais', 'agendamentos.profissional_id', '=', 'profissionais.id')
            ->Join('consultas', 'agendamentos.consulta_id', '=', 'consultas.id')
            ->where('agendamentos.id','=', $id)
            ->select('consultas.*', 'especializacoes.especializacao as tipo_especializacao', 'pacientes.nome as nome_paciente', 'profissionais.nome as nome_profissional', 'consultas.id', 'consultas.data as data_consulta')
            ->orderBy('agendamentos.id')
            ->get();
        }
        return view('Cadastros/listaagendamentos', ['agendamentos' => $agendamentos]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Agendamento = Agendamento::findorfail($id);
        $Agendamento->delete();
        return redirect()->route('agendamentos-index');
    }
}
