<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\AtuaArea;
use App\Models\Consulta;
use App\Models\Especializacao;
use App\Models\Profissional;
use App\Models\Usuario;
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

    /**
     * Store a newly created resource in storage.
     */
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
        $validated['endereco_consulta']= 'Rua dos patos, 8000';

        $agendamento = Agendamento::create($validated);

        $consulta = Consulta::create([
            'agenadmento_id'=> 1,
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
        $areas_atuacao = AtuaArea::all();
        foreach ($areas_atuacao as $area) {
            $especializacoes[$area->id] = Especializacao::where('area_atuacao_id', $area->id)->get();
        };
        $profissionais = Usuario::where('tipo_usuario', '2')->get();
        return view('agendamentos.agendaconsulta', compact('areas_atuacao', 'especializacoes', 'profissionais', 'areas_atuacao'));
    }


    public function destroy($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $agendamento->delete();
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento deletado com sucesso!');
    }

    public function getProfissionaisByEspecializacao($especializacao_id)
    {
        $profissionais = Profissional::where('especializacao_id', $especializacao_id)->get();
        return response()->json($profissionais);
    }
}
