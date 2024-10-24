<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\AtuaArea;
use App\Models\Consulta;
use App\Models\Especializacao;
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
            $agendamentos = Agendamento::where('paciente_id', $user->paciente->id)
                ->whereHas('consulta', function ($query) use ($today) {
                    $query->where('data', '<', $today)
                        ->orWhere('situacao', 1)
                        ->orWhere('situacao', 2);
                })
                ->paginate(5);
        } elseif ($user->tipo_usuario === 2) {
            $agendamentos = Agendamento::where('profissional_id', $user->profissional->id)
                ->whereHas('consulta', function ($query) use ($today) {
                    $query->where('data', '<', $today)
                        ->orWhere('situacao', 1)
                        ->orWhere('situacao', 2);
                })
                ->paginate(5);
        } else {
            $agendamentos = collect();
        }

        return view('agendamentos.listaagendamentos', compact('agendamentos'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'especializacao_id' => 'required|exists:especializacoes,id',
            'area_atuacao_id' => 'required|exists:areas_atuacao,id',
            'profissional_id' => 'required|exists:profissionais,usuario_id',
            'data_agendamento' => 'required|date|after_or_equal:today',
        ]);

        $validated['paciente_id'] = Auth::user()->id;
        $validated['situacao_paciente'] = 1;
        $validated['situacao_profissional'] = 1;
        $validated['endereco_consulta'] = 'Rua dos patos, 8000';

        $agendamento = Agendamento::create($validated);

        $consulta = Consulta::create([
            'agenadmento_id' => $agendamento->id, // Corrigido para usar o id correto
            'data' => $validated['data_agendamento'],
            'situacao' => '1',
            'profissional_id' => $validated['profissional_id'],
            'paciente_id' => $validated['paciente_id'],
            'valor' => 100.0,
        ]);

        return redirect()->route('consultas.index')->with('success', 'Agendamento criado com sucesso!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areasAtuacao = AtuaArea::all();
        return view('agendamentos.agendaconsulta', compact('areasAtuacao'));
        dd($especializacoes);
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
        $profissionais = Profissional::where('especializacao_id', $especializaco_id)->get();
        $identificacao = $profissionais->map(function($profissional) {
            return [
                'id' => $profissional->id,
                'nome_completo' => Usuario::find($profissional->usuario_id)->nome_completo // ou outro campo que você precise
            ];
        });
        return response()->json($identificacao);
    }

}
