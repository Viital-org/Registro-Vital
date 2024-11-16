<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Anotacaosaude;
use App\Models\Consulta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultasController extends Controller
{
    /**
     * Exibir lista de consultas.
     */
    public function index()
    {
        $user = Auth::user();
        $today = date('Y-m-d');

        // Atualizar status de consultas antigas
        Consulta::whereHas('agendamento', function ($query) use ($today) {
            $query->where('data_agendamento', '<', $today);
        })->where('situacao', 1)
            ->update(['situacao' => 2]);

        // Selecionar consultas relevantes
        $consultas = Consulta::with(['agendamento.especializacao'])
            ->where(function ($query) use ($user) {
                if ($user->tipo_usuario === 1) { // Paciente
                    $query->where('paciente_id', $user->id);
                } elseif ($user->tipo_usuario === 2) { // Profissional
                    $query->where('profissional_id', $user->id);
                }
            })
            ->whereIn('situacao', [0, 1, 5]) // Inclui as consultas em andamento
            ->select('id', 'agendamento_id', 'situacao')
            ->paginate(5);

        return view('consultas.listaconsultas', compact('consultas'));
    }

// Método para confirmar ou cancelar consulta

    /**
     * Atualizar status da consulta.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $consulta = Consulta::findOrFail($id);

        if ($user->tipo_usuario === 1 && $user->id === $consulta->paciente_id) {
            $validated = $request->validate([
                'situacao' => 'required|in:0,1,2,3, 4, 5', // 0: Pendente, 1: Confirmada, 2: Finalizada, 3: Cancelada , 4: Cancelada  Pelo Profissional, 5: Ativa
            ]);

            $consulta->update($validated);
            return redirect()->route('consultas.index')->with('success', 'Status atualizado com sucesso!');
        }

        return redirect()->route('consultas.index')->with('error', 'Você não tem permissão para atualizar esta consulta.');
    }

    public function alterarSituacao(Request $request, $id)
    {
        $user = Auth::user();
        $consulta = Consulta::findOrFail($id);

        // Validação de entrada
        $validated = $request->validate([
            'situacao' => 'required|in:1,2,3,4, 5', // Status permitidos
            'motivo' => 'nullable|string|max:255', // Motivo é opcional, mas obrigatório para situação 4
        ]);

        // Verificar permissões para alterar o status
        if ($user->tipo_usuario === 2 && $user->id === $consulta->profissional_id) {
            if ($validated['situacao'] == 4 && empty($validated['motivo'])) {
                return back()->withErrors(['motivo' => 'O motivo é obrigatório ao cancelar.']);
            }
        } elseif ($user->tipo_usuario === 1 && !in_array($validated['situacao'], [1, 3])) {
            return redirect()->route('consultas.index')->with('error', 'Ação não permitida.');
        }

        // Atualizar situação
        $consulta->update([
            'situacao' => $validated['situacao'],
            'motivo' => $validated['motivo'] ?? null,
        ]);

        return redirect()->route('consultas.index')->with('success', 'Status atualizado com sucesso!');
    }

    /**
     * Criar uma nova consulta a partir de um agendamento.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'agendamento_id' => 'required|exists:agendamentos,id',
        ]);

        $agendamento = Agendamento::findOrFail($validated['agendamento_id']);
        $consulta = Consulta::create([
            'id' => $agendamento->id,
            'paciente_id' => $agendamento->paciente_id,
            'profissional_id' => $agendamento->profissional_id,
            'agendamento_id' => $agendamento->id,
            'situacao' => 0, // Padrão: pendente
        ]);

        return redirect()->route('consultas.index')->with('success', 'Consulta criada com sucesso!');
    }

    /**
     * Mostrar detalhes da consulta.
     */
    public function show($id)
    {
        $consulta = Consulta::with(['profissional.usuario', 'paciente.usuario', 'agendamento.endereco'])->findOrFail($id);
        $user = Auth::user();

        // Verificar permissões
        if (($user->tipo_usuario === 1 && $consulta->paciente_id !== $user->id) ||
            ($user->tipo_usuario === 2 && $consulta->profissional_id !== $user->id)) {
            return redirect()->route('welcome')->with('error', 'Você não tem permissão para acessar esta página.');
        }

        // Retornar a view com os dados completos
        return view('consultas.showconsultas', compact('consulta'));
    }

    /**
     * Excluir consulta.
     */
    public function destroy($id)
    {
        $consulta = Consulta::findOrFail($id);
        $user = Auth::user();

        if (($user->tipo_usuario === 1 && $consulta->paciente_id !== $user->id) ||
            ($user->tipo_usuario === 2 && $consulta->profissional_id !== $user->id)) {
            return redirect()->route('welcome')->with('error', 'Você não tem permissão para excluir esta consulta.');
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

        // Verifica se o usuário é um profissional e se ele está tentando acessar uma consulta que não é dele
        if ($user->tipo_usuario === 2 && $consulta->profissional_id !== $user->id) {
            return redirect()->route('welcome')->with('error', 'Você não tem permissão para acessar esta página.');
        }

        // Consulta as anotações do paciente com visibilidade = 1 (visíveis ao profissional)
        $anotacoessaude = Anotacaosaude::where('paciente_id', $consulta->paciente_id)
            ->where('tipo_visibilidade', '1')  // Apenas as anotações com visibilidade pública
            ->join('tipos_anotacao', 'tipos_anotacao.id', '=', 'anotacoes.tipo_anotacao')
            ->select('anotacoes.*', 'tipos_anotacao.descricao_tipo as tipo_anotacao')
            ->simplePaginate(5);

        // Retorna a view com as anotações do paciente
        return view('Anotacoes.listaanotacoesmedico', compact('anotacoessaude', 'consulta'));
    }

    public function iniciar($id)
    {
        $consulta = Consulta::findOrFail($id);

        // Confirma se a consulta está em estado confirmado (situacao = 1)
        if ($consulta->situacao !== 1) {
            return redirect()->back()->with('error', 'Não é possível iniciar esta consulta.');
        }

        // Atualiza o horário de início real e define a situação como "em andamento"
        $consulta->horario_inicio_real = now();
        $consulta->situacao = 5; // Status "em andamento"
        $consulta->save();

        // Redireciona para a view de consulta ativa
        return redirect()->route('consultas.ativa', $consulta->id)->with('success', 'Consulta iniciada com sucesso.');
    }

    public function finalizar($id)
    {
        $consulta = Consulta::findOrFail($id);

        // Confirma se a consulta está em andamento (situacao = 5)
        if ($consulta->situacao !== 5) {
            return redirect()->back()->with('error', 'Não é possível finalizar esta consulta.');
        }

        $consulta->horario_fim_real = Carbon::now();
        $consulta->situacao = 2; // Status "finalizada"
        $consulta->save();

        return redirect()->route('consultas.index')->with('success', 'Consulta finalizada com sucesso.');
    }

    public function consultaAtiva($id)
    {
        $consulta = Consulta::with(['paciente', 'agendamento'])->findOrFail($id);

        if ($consulta->situacao !== 5) {
            return redirect()->route('consultas.index')->with('error', 'Esta consulta não está em andamento.');
        }

        if (auth()->user()->tipo_usuario === 2 && auth()->user()->id !== $consulta->profissional_id) {
            return abort(403, 'Acesso negado. Você não está autorizado a acessar esta consulta.');
        }

        if (auth()->user()->tipo_usuario === 1 && auth()->user()->id !== $consulta->paciente_id) {
            return abort(403, 'Acesso negado. Você não está autorizado a acessar esta consulta.');
        }

        return view('consultas.ativa', compact('consulta'));
    }
}
