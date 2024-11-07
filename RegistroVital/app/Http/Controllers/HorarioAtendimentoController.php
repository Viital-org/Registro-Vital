<?php

namespace App\Http\Controllers;

use App\Models\EspecializacaoProfissional;
use App\Models\HorarioAtendimento;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HorarioAtendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validações básicas do formulário
        $request->validate([
            'especializacao_profissional_id' => 'required|exists:especializacoes_profissionais,id',
            'dia_semana' => 'required|string',
            'inicio_atendimento' => 'required|date_format:H:i',
            'fim_atendimento' => 'required|date_format:H:i|after:inicio_atendimento',
            'tempo_consulta' => 'required|date_format:H:i',
            'inicio_pausa' => 'nullable|date_format:H:i',
            'fim_pausa' => 'nullable|date_format:H:i|after:inicio_pausa',
        ]);

        // Dados do horário
        $especializacaoId = $request->especializacao_profissional_id;
        $diaSemana = $request->dia_semana;
        $inicioAtendimento = Carbon::createFromFormat('H:i', $request->inicio_atendimento);
        $fimAtendimento = Carbon::createFromFormat('H:i', $request->fim_atendimento);
        $tempoConsulta = Carbon::createFromFormat('H:i', $request->tempo_consulta);

        // Verificação do tempo de consulta dentro do intervalo de atendimento
        $intervaloAtendimento = $inicioAtendimento->diffInMinutes($fimAtendimento);
        $duracaoConsulta = $tempoConsulta->hour * 60 + $tempoConsulta->minute;

        if ($duracaoConsulta > $intervaloAtendimento) {
            return redirect()->back()->withErrors(['O tempo de consulta excede o intervalo total de atendimento. Ajuste o tempo de consulta para que caiba dentro do período de atendimento.']);
        }

        // Verificação da pausa dentro do intervalo de atendimento, se existir
        if ($request->filled('inicio_pausa') && $request->filled('fim_pausa')) {
            $inicioPausa = Carbon::createFromFormat('H:i', $request->inicio_pausa);
            $fimPausa = Carbon::createFromFormat('H:i', $request->fim_pausa);

            if ($inicioPausa->lt($inicioAtendimento) || $fimPausa->gt($fimAtendimento) || $inicioPausa->eq($inicioAtendimento)) {
                return redirect()->back()->withErrors(['O intervalo de pausa deve estar totalmente dentro do período de atendimento e não pode coincidir com o início do atendimento. Ajuste os horários de pausa.']);
            }
        }

        // Verificar se há conflitos de horário para o mesmo dia, ignorando a especialização
        $conflito = HorarioAtendimento::where('dia_semana', $diaSemana)
            ->where(function ($query) use ($inicioAtendimento, $fimAtendimento) {
                $query->whereBetween('inicio_atendimento', [$inicioAtendimento->format('H:i'), $fimAtendimento->format('H:i')])
                    ->orWhereBetween('fim_atendimento', [$inicioAtendimento->format('H:i'), $fimAtendimento->format('H:i')])
                    ->orWhere(function ($query) use ($inicioAtendimento, $fimAtendimento) {
                        $query->where('inicio_atendimento', '<=', $inicioAtendimento->format('H:i'))
                            ->where('fim_atendimento', '>=', $fimAtendimento->format('H:i'));
                    });
            })
            ->exists();

        if ($conflito) {
            return redirect()->back()->withErrors(['Horário conflitante com outro já cadastrado. Escolha um horário diferente.']);
        }

        // Criação do horário de atendimento
        HorarioAtendimento::create($request->all());

        return redirect()->route('minhasespecializacoes.index')
            ->with('success', 'Horário de atendimento cadastrado com sucesso!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        // Busca a especialização do profissional usando o ID fornecido
        $especializacaoProfissional = EspecializacaoProfissional::findOrFail($id);

        // Retorna a view de cadastro de horário, passando a especialização
        return view('EspecializacoesProfissionais.Horarios', compact('especializacaoProfissional'));
    }

    /**
     * Display the specified resource.
     */
    public function show(HorarioAtendimento $horarioAtendimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $horarioAtendimento = HorarioAtendimento::find($id);

        if (!$horarioAtendimento) {
            return redirect()->route('horarios.listar')->with('error', 'Horário não encontrado');
        }

        return view('EspecializacoesProfissionais.EditarHorario', compact('horarioAtendimento'));
    }

    public function update(Request $request, HorarioAtendimento $horarioAtendimento)
    {
        // Validações básicas do formulário
        $request->validate([
            'dia_semana' => 'required|string',
            'inicio_atendimento' => 'required|date_format:H:i',
            'fim_atendimento' => 'required|date_format:H:i|after:inicio_atendimento',
            'tempo_consulta' => 'required|date_format:H:i',
            'inicio_pausa' => 'nullable|date_format:H:i',
            'fim_pausa' => 'nullable|date_format:H:i|after:inicio_pausa',
        ]);

        // Captura os valores de hora com segurança
        try {
            $inicioAtendimento = Carbon::createFromFormat('H:i', $request->inicio_atendimento);
            $fimAtendimento = Carbon::createFromFormat('H:i', $request->fim_atendimento);
            $tempoConsulta = Carbon::createFromFormat('H:i', $request->tempo_consulta);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Formato de hora inválido. Certifique-se de usar o formato H:i.']);
        }

        // Verificação do tempo de consulta dentro do intervalo de atendimento
        $intervaloAtendimento = $inicioAtendimento->diffInMinutes($fimAtendimento);
        $duracaoConsulta = $tempoConsulta->hour * 60 + $tempoConsulta->minute;

        if ($duracaoConsulta > $intervaloAtendimento) {
            return redirect()->back()->withErrors(['O tempo de consulta excede o intervalo total de atendimento. Ajuste o tempo de consulta para que caiba dentro do período de atendimento.']);
        }

        // Verificação da pausa dentro do intervalo de atendimento, se existir
        if ($request->filled('inicio_pausa') && $request->filled('fim_pausa')) {
            $inicioPausa = Carbon::createFromFormat('H:i', $request->inicio_pausa);
            $fimPausa = Carbon::createFromFormat('H:i', $request->fim_pausa);

            if ($inicioPausa->lt($inicioAtendimento) || $fimPausa->gt($fimAtendimento) || $inicioPausa->eq($inicioAtendimento)) {
                return redirect()->back()->withErrors(['O intervalo de pausa deve estar totalmente dentro do período de atendimento e não pode coincidir com o início do atendimento. Ajuste os horários de pausa.']);
            }
        }

        // Verificar se há conflitos de horário para o mesmo dia, ignorando o próprio horário sendo atualizado
        $conflito = HorarioAtendimento::where('dia_semana', $request->dia_semana)
            ->where('id', '!=', $horarioAtendimento->id)  // Ignora o próprio horário sendo editado
            ->where(function ($query) use ($inicioAtendimento, $fimAtendimento) {
                $query->where(function ($subQuery) use ($inicioAtendimento, $fimAtendimento) {
                    $subQuery->whereBetween('inicio_atendimento', [$inicioAtendimento->format('H:i'), $fimAtendimento->format('H:i')])
                        ->orWhereBetween('fim_atendimento', [$inicioAtendimento->format('H:i'), $fimAtendimento->format('H:i')])
                        ->orWhere(function ($overlapQuery) use ($inicioAtendimento, $fimAtendimento) {
                            $overlapQuery->where('inicio_atendimento', '<=', $inicioAtendimento->format('H:i'))
                                ->where('fim_atendimento', '>=', $fimAtendimento->format('H:i'));
                        });
                });
            })
            ->exists();

        // Retorna erro se houver conflito com outros horários
        if ($conflito) {
            return redirect()->back()->withErrors(['Horário conflitante com outro já cadastrado. Escolha um horário diferente.']);
        }

        // Atualização do horário de atendimento
        $horarioAtendimento->update([
            'dia_semana' => $request->dia_semana,
            'inicio_atendimento' => $inicioAtendimento->format('H:i'),
            'fim_atendimento' => $fimAtendimento->format('H:i'),
            'tempo_consulta' => $tempoConsulta->format('H:i'),
            'inicio_pausa' => $request->filled('inicio_pausa') ? $inicioPausa->format('H:i') : null,
            'fim_pausa' => $request->filled('fim_pausa') ? $fimPausa->format('H:i') : null,
        ]);

        return redirect()->route('horarios.listar', ['id' => $horarioAtendimento->especializacao_profissional_id])
            ->with('success', 'Horário de atendimento atualizado com sucesso!');
    }


    public function destroy(HorarioAtendimento $horarioAtendimento)
    {
        $horarioAtendimento->delete();
        return redirect()->back()->with('success', 'Horário de atendimento excluído com sucesso!');
    }

    public function listar($id)
    {
        $horarios = HorarioAtendimento::where('especializacao_profissional_id', $id)->get();
        return view('EspecializacoesProfissionais.ListaHorarios', compact('horarios'));
    }
}
