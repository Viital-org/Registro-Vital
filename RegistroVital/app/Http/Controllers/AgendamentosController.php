<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\AtuaArea;
use App\Models\Consulta;
use App\Models\Especializacao;
use App\Models\EspecializacaoProfissional;
use App\Models\HorarioAtendimento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgendamentosController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $today = date('Y-m-d');
        if ($user->tipo_usuario === 1) {
            $agendamentos = Agendamento::where('paciente_id', $user->id)
                ->with('profissionais', 'especializacoes', 'endereco')
                ->paginate(5);
        } elseif ($user->tipo_usuario === 2) {
            $agendamentos = Agendamento::where('profissional_id', $user->id)
                ->with('paciente', 'especializacoes', 'endereco')
                ->paginate(5);
        } else {
            $agendamentos = collect();
        }
        return view('agendamentos.listaagendamentos', compact('agendamentos'));
    }

    public function store(Request $request)
    {
        $valor_atendimento = EspecializacaoProfissional::getValorAtendimento($request['profissional_id'], $request['especializacao_id']);

        $validated = $request->validate([
            'especializacao_id' => 'required|exists:especializacoes,id',
            'area_atuacao_id' => 'required|exists:areas_atuacao,id',
            'profissional_id' => 'required|exists:profissionais,usuario_id',
            'data_agendamento' => 'required|date|after_or_equal:today',
            'hora_agendamento' => 'required|date_format:H:i',
            'endereco_id' => 'required',
        ]);

        $validated['paciente_id'] = Auth::user()->id;
        $validated['valor_atendimento'] = $valor_atendimento;
        $validated['situacao_paciente'] = 1;
        $validated['situacao_profissional'] = 3;
        $validated['endereco_consulta_id'] = $validated['endereco_id'];

        // Verificar se já existe um agendamento para o mesmo profissional, especialização e horário
        $exists = Agendamento::where('profissional_id', $validated['profissional_id'])
            ->where('especializacao_id', $validated['especializacao_id'])
            ->where('data_agendamento', $validated['data_agendamento'])
            ->where('hora_agendamento', $validated['hora_agendamento'])
            ->exists();

        if ($exists) {
            return back()->withErrors(['horario' => 'O profissional já possui um agendamento neste horário.']);
        }

        // Criação do Agendamento e da Consulta
        $agendamento = Agendamento::create($validated);

        $consulta = Consulta::create([
            'agendamento_id' => $agendamento->id,
            'situacao' => '3',
            'profissional_id' => $validated['profissional_id'],
            'paciente_id' => $validated['paciente_id'],
        ]);

        return redirect()->route('agendamentos.index')->with('success', 'Agendamento criado com sucesso!');
    }

    public function create()
    {
        $areasAtuacao = AtuaArea::all();
        return view('agendamentos.agendaconsulta', compact('areasAtuacao'));
    }

    public function destroy($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $agendamento->delete();
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento deletado com sucesso!');
    }


    public function getEspecializacoes($areaAtuacaoId)
    {
        $especializacoes = Especializacao::where('area_atuacao_id', $areaAtuacaoId)->get();

        return response()->json($especializacoes);
    }

    public function getDiasdaSemana($profissionalId, $especializacaoId, $areaAtuacaoId)
    {
        // Busca os dias de atendimento com base na relação entre as tabelas
        $diasAtendimento = DB::table('horarios_atendimento')
            ->join('especializacoes_profissionais', 'especializacoes_profissionais.id', '=', 'horarios_atendimento.especializacao_profissional_id')
            ->where('especializacoes_profissionais.profissional_id', $profissionalId)
            ->where('especializacoes_profissionais.area_atuacao_id', $areaAtuacaoId)
            ->where('especializacoes_profissionais.especializacao_id', $especializacaoId)
            ->pluck('horarios_atendimento.dia_semana'); // Aqui, estamos pegando o campo 'dia_semana' diretamente da tabela 'horarios_atendimento'

        $diasDisponiveis = [];
        foreach ($diasAtendimento as $dia) {
            $diasDisponiveis[] = $this->traduzirDiaSemana($dia); // Traduzindo os dias para o formato correto
        }

        return response()->json($diasDisponiveis); // Retornando os dias traduzidos
    }

    private function traduzirDiaSemana($diaEmPortugues)
    {
        $dias = [
            "Segunda-feira" => "Monday",
            "Terça-feira" => "Tuesday",
            "Quarta-feira" => "Wednesday",
            "Quinta-feira" => "Thursday",
            "Sexta-feira" => "Friday",
            "Sábado" => "Saturday",
            "Domingo" => "Sunday"
        ];
        return $dias[$diaEmPortugues] ?? null;
    }

    public function getEspecializacaoProfissionalId($profissionalId, $especializacaoId, $areaAtuacaoId)
    {
        $especializacaoProfissional = EspecializacaoProfissional::where('profissional_id', $profissionalId)
            ->where('especializacao_id', $especializacaoId)
            ->where('area_atuacao_id', $areaAtuacaoId)
            ->first(['id']); // Retorna apenas o ID

        return response()->json(['especializacao_profissional_id' => $especializacaoProfissional->id ?? null]);
    }

    public function getHorariosDisponiveis(Request $request)
    {
        $especializacaoProfissionalId = $request->query('especializacao_profissional_id');
        $diaSemana = $request->query('dia_semana');

        // Obtém os horários de atendimento
        $horarios = HorarioAtendimento::where('especializacao_profissional_id', $especializacaoProfissionalId)
            ->where('dia_semana', $diaSemana)
            ->get(['id', 'inicio_atendimento', 'fim_atendimento', 'tempo_consulta', 'inicio_pausa', 'fim_pausa']);

        $horariosDisponiveis = [];

        foreach ($horarios as $horario) {
            $inicioAtendimento = Carbon::createFromFormat('H:i:s', $horario->inicio_atendimento);
            $fimAtendimento = Carbon::createFromFormat('H:i:s', $horario->fim_atendimento);
            $tempoConsulta = Carbon::createFromFormat('H:i:s', $horario->tempo_consulta);

            // Definir o horário de pausa, se existir
            $inicioPausa = $horario->inicio_pausa ? Carbon::createFromFormat('H:i:s', $horario->inicio_pausa) : null;
            $fimPausa = $horario->fim_pausa ? Carbon::createFromFormat('H:i:s', $horario->fim_pausa) : null;

            // Calcular todos os horários disponíveis baseados no tempo de consulta
            while ($inicioAtendimento < $fimAtendimento) {
                // Adiciona o tempo de consulta ao horário de início
                $fimConsulta = $inicioAtendimento->copy()->addMinutes($tempoConsulta->minute);

                // Verificar se o intervalo de consulta não cai dentro da pausa
                if ($inicioPausa && $fimPausa) {
                    // Ignorar horários que estão dentro do período de pausa
                    if (($inicioAtendimento >= $inicioPausa && $inicioAtendimento < $fimPausa) ||
                        ($fimConsulta > $inicioPausa && $fimConsulta <= $fimPausa)) {
                        // Avança para o próximo horário, ignorando esse
                        $inicioAtendimento = $fimConsulta;
                        continue;
                    }
                }

                // Se o intervalo não cair na pausa, adicionar
                if ($fimConsulta <= $fimAtendimento) {
                    $horariosDisponiveis[] = [
                        'id' => $horario->id,
                        'inicio_atendimento' => $inicioAtendimento->format('H:i:s'),
                    ];
                }

                // Avançar para o próximo horário
                $inicioAtendimento = $fimConsulta;
            }
        }

        return response()->json($horariosDisponiveis);
    }

    public function getProfissionaisPorEspecializacao($areaAtuacaoId, $especializacaoId)
    {
        // Retorna os profissionais relacionados à área de atuação e especialização
        $profissionais = EspecializacaoProfissional::where('area_atuacao_id', $areaAtuacaoId)
            ->where('especializacao_id', $especializacaoId)
            ->with('profissionais')  // Carrega os dados do usuário relacionado ao profissional
            ->get()
            ->pluck('profissionais') // Obtém os profissionais relacionados
            ->flatten(); // Achata a coleção em um único nível

        // Aqui, extraímos o nome completo do usuário associado ao profissional
        return response()->json($profissionais->map(function ($profissional) {
            return [
                'usuario_id' => $profissional->usuario_id,
                'nome_completo' => $profissional->usuario ? $profissional->usuario->nome_completo : 'Usuário não encontrado',
            ];
        }));
    }

    public function getEnderecoPorProfissional($profissionalId, $areaAtuacaoId, $especializacaoId)
    {
        // Verifique se os parâmetros são válidos
        if (empty($profissionalId) || empty($areaAtuacaoId) || empty($especializacaoId)) {
            return response()->json(['message' => 'Parâmetros inválidos'], 400);
        }

        // Obtém a especialização profissional relacionada ao profissional, área de atuação e especialização selecionados
        $especializacaoProfissional = EspecializacaoProfissional::where('profissional_id', $profissionalId)
            ->where('area_atuacao_id', $areaAtuacaoId)  // Filtra pela área de atuação
            ->where('especializacao_id', $especializacaoId)  // Filtra pela especialização
            ->with('enderecos')  // Carrega o endereço relacionado
            ->first();

        // Verifica se existe um endereço associado ao profissional
        if ($especializacaoProfissional && $especializacaoProfissional->enderecos) {
            // Retorna os dados do endereço
            return response()->json([
                'endereco_atuacao_id' => $especializacaoProfissional->enderecos->id,
                'endereco' => $especializacaoProfissional->enderecos->rua . ', ' .
                    $especializacaoProfissional->enderecos->numero_endereco . ', ' .
                    $especializacaoProfissional->enderecos->bairro . ', ' .
                    $especializacaoProfissional->enderecos->cidade . ' - ' .
                    $especializacaoProfissional->enderecos->uf
            ]);
        }

        return response()->json(['message' => 'Endereço não encontrado'], 404);
    }
    public function getValorConsulta($profissionalId, $areaAtuacaoId, $especializacaoId)
    {
        // Busca o registro relacionado ao profissional, especialização e área de atuação
        $especializacaoProfissional = EspecializacaoProfissional::where('profissional_id', $profissionalId)
            ->where('area_atuacao_id', $areaAtuacaoId)
            ->where('especializacao_id', $especializacaoId)
            ->first(); // Não precisa de 'with' aqui para o valor_atendimento

        if ($especializacaoProfissional) {
            // Retorna o valor formatado com 2 casas decimais
            return response()->json([
                'valor_atendimento' => number_format($especializacaoProfissional->valor_atendimento, 2, ',', '.')
            ]);
        }

        // Se não encontrar o valor, retorna erro 404
        return response()->json(['valor_atendimento' => null], 404);
    }
}
