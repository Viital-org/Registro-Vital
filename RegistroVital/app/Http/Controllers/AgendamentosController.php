<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\AtuaArea;
use App\Models\Consulta;
use App\Models\Endereco;
use App\Models\Especializacao;
use App\Models\EspecializacaoProfissional;
use App\Models\Profissional;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

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
            'endereco_id'=> 'required',
        ]);

        $validated['paciente_id'] = Auth::user()->id;
        $validated['valor_atendimento'] = $valor_atendimento;
        $validated['situacao_paciente'] = 1;
        $validated['situacao_profissional'] = 3;
        $validated['endereco_consulta_id'] = $validated['endereco_id'];

        $agendamento = Agendamento::create($validated);

        $consulta = Consulta::create([
            'agendamento_id' => $agendamento->id, // Corrigido para usar o id correto
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


    public function getEspecializacoes($area_atuacao_id): JsonResponse
    {
        $especializacoes = Especializacao::where('area_atuacao_id', $area_atuacao_id)->get();
        return response()->json($especializacoes);

    }

    public function getProfissional($especializaco_id): JsonResponse
    {
        $especializacoes = EspecializacaoProfissional::where('especializacao_id', $especializaco_id)->get();

        if ($especializacoes->isEmpty()) { // Retorna nada se não encontrar a esepecialização -- Só pra garantir
            return response()->json([]);
        }

        $profissionalIds = $especializacoes->pluck('profissional_id'); // traz os ids apenas

        $profissionais = Profissional::whereIn('id', $profissionalIds)
            ->join('usuarios', 'usuarios.id', '=', 'profissionais.usuario_id')
            ->select('profissionais.usuario_id', 'usuarios.nome_completo')
            ->get();

        return response()->json($profissionais);
    }

    public function getEnderecos($profissional_id, $especializacao_id) {
            $enderecos = Endereco::whereHas('especializacoesprofissionais', function ($query) use ($profissional_id, $especializacao_id) {
                $query->where('profissional_id', $profissional_id)
                    ->where('especializacao_id', $especializacao_id);
            })->get();

            return response()->json($enderecos);
    }
}
