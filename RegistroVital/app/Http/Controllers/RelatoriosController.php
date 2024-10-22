<?php

namespace App\Http\Controllers;

use App\Models\Anotacaosaude;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelatoriosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function relatorios_paciente()
    {
        $pacienteId = auth()->user()->id;

        $anotacoes = DB::table('anotacoes')
            ->select('tipos_anotacao.descricao_tipo', DB::raw('count(anotacoes.id) as total'))
            ->join('tipos_anotacao', 'anotacoes.tipo_anotacao', '=', 'tipos_anotacao.id')
            ->where('anotacoes.paciente_id', $pacienteId)
            ->groupBy('tipos_anotacao.descricao_tipo')
            ->get();

        $totalAnotacoes = $anotacoes->sum('total');

        $anotacoes->each(function ($anotacao) use ($totalAnotacoes) {
            $anotacao->percentual = round(($anotacao->total / $totalAnotacoes) * 100, 2);
        });

        return view('Relatorios.relatorio_paciente', compact('anotacoes', 'totalAnotacoes'));
    }

    public function relatorios_administrador()
    {
        // Contagem de usuários por tipo
        $usuariosPorTipo = Usuario::select('tipo_usuario', Usuario::raw('count(*) as total'))
            ->groupBy('tipo_usuario')
            ->get();

        // Top 5 usuários com mais anotações
        $topUsuariosAnotacoes = Anotacaosaude::select('anotacoes.paciente_id', DB::raw('count(*) as total'), 'usuarios.nome_completo')
            ->join('pacientes', 'anotacoes.paciente_id', '=', 'pacientes.usuario_id')
            ->join('usuarios', 'pacientes.usuario_id', '=', 'usuarios.id')
            ->groupBy('anotacoes.paciente_id', 'usuarios.nome_completo')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        // Tipos de anotações mais frequentes
        $tiposAnotacoesFrequentes = Anotacaosaude::select('tipos_anotacao.descricao_tipo', Anotacaosaude::raw('count(*) as total'))
            ->join('tipos_anotacao', 'anotacoes.tipo_anotacao', '=', 'tipos_anotacao.id')
            ->groupBy('tipos_anotacao.descricao_tipo')
            ->orderBy('total', 'desc')
            ->get();

        return view('Relatorios.relatorio_administrador', compact('usuariosPorTipo', 'topUsuariosAnotacoes', 'tiposAnotacoesFrequentes'));
    }
}
