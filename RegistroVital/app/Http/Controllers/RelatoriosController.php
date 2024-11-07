<?php

namespace App\Http\Controllers;

use App\Models\Anotacaosaude;
use App\Models\Paciente;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class RelatoriosController extends Controller
{

    public function relatorios_paciente()
    {
        $pacienteId = auth()->user()->id;

        // Relatório de Anotações
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

        // Relatório de Metas
        $metas = DB::table('metas')
            ->select('situacao', DB::raw('count(id) as total'))
            ->where('paciente_id', Paciente::where('usuario_id', $pacienteId)->firstOrFail()->usuario_id)
            ->groupBy('situacao')
            ->get();

        $totalMetas = $metas->sum('total');

        $metas->each(function ($meta) use ($totalMetas) {
            $meta->percentual = round(($meta->total / $totalMetas) * 100, 2);
        });

        return view('Relatorios.relatorio_paciente', compact('anotacoes', 'totalAnotacoes', 'metas', 'totalMetas'));
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
