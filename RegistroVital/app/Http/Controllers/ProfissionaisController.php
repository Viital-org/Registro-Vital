<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\AtuaArea;
use App\Models\Especializacao;
use App\Models\Paciente;
use App\Models\Profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfissionaisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profissionais = Profissional::leftJoin('atuaareas', 'profissionais.areaatuacao_id', '=', 'atuaareas.id')
            ->leftJoin('especializacoes', 'profissionais.especializacao_id', '=', 'especializacoes.id')
            ->select('profissionais.*', 'atuaareas.area', 'especializacoes.especializacao')
            ->orderBy('profissionais.created_at')
            ->simplePaginate(5);
        // ->get();

        return view('Cadastros/listaprofissionais', ['profissionais' => $profissionais]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'areaatuacao_id' => 'required|exists:atuaareas,id',
            'especializacao_id' => 'nullable|exists:especializacoes,id',
            'enderecoatuacao' => 'required|string|max:255',
            'localformacao' => 'required|string|max:255',
            'dataformacao' => 'required|date',
            'descricaoperfil' => 'required|string|max:255',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['nome'] = Auth::user()->name;
        $validated['email'] = Auth::user()->email;

        Profissional::create($validated);

        return redirect()->route('medico.dashboard')->with('success', 'Profissional cadastrado com sucesso!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $atuaareas = AtuaArea::all();
        $especializacoes = collect();

        if (request()->has('areaatuacao_id')) {
            $areaId = request('areaatuacao_id');
            $especializacoes = Especializacao::where('area_id', $areaId)->get();
        }

        return view('Cadastros/cadastroprofissional', [
            'user' => $user,
            'atuaareas' => $atuaareas,
            'especializacoes' => $especializacoes
        ]);
    }

    public function especializacoesPorArea($areaId)
    {
        $especializacoes = Especializacao::where('area_id', $areaId)->get();
        return response()->json($especializacoes);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->input('id');

        if ($id === null) {
            $profissionais = Profissional::leftJoin('atuaareas', 'profissionais.areaatuacao_id', '=', 'atuaareas.id')
                ->leftJoin('especializacoes', 'profissionais.especializacao_id', '=', 'especializacoes.id')
                ->select('profissionais.*', 'atuaareas.area', 'especializacoes.especializacao')
                ->orderBy('profissionais.created_at')
                ->get();
        } else {
            $profissionais = Profissional::leftJoin('atuaareas', 'profissionais.areaatuacao_id', '=', 'atuaareas.id')
                ->leftJoin('especializacoes', 'profissionais.especializacao_id', '=', 'especializacoes.id')
                ->where('profissionais.id', '=', $id)
                ->select('profissionais.*', 'atuaareas.area', 'especializacoes.especializacao')
                ->orderBy('profissionais.created_at')
                ->get();
        }

        return view('Cadastros/listaprofissionais', ['profissionais' => $profissionais]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();
        $profissionais = Profissional::where('user_id', $user->id)->firstOrFail();
        $atuaareas = AtuaArea::all();

        return view('Cadastros.editarprofissional', [
            'profissionais' => $profissionais,
            'atuaareas' => $atuaareas,
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $profissionais = Profissional::where('user_id', $user->id)->firstOrFail();

        $validated = $request->validate([
            'areaatuacao_id' => 'required|exists:atua_areas,id',
            'especializacao_id' => 'nullable|exists:especializacoes,id',
            'enderecoatuacao' => 'required|string|max:255',
            'localformacao' => 'required|string|max:255',
            'dataformacao' => 'required|date',
            'descricaoperfil' => 'required|string|max:255',
        ]);

        $profissionais->update($validated);

        return redirect()->route('medico.dashboard')->with('success', 'Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $profissional = Profissional::findOrFail($id);
        $profissional->delete();
        return redirect()->route('profissionais-index')->with('success', 'Profissional deletado com sucesso!');
    }

    public function tela()
    {
        // Obtém o ID do profissional autenticado
        $usuarioId = Auth::id();

        // Carrega os próximos agendamentos do profissional
        // Buscando agendamentos futuros relacionados ao usuário logado
        $hoje = now()->toDateString(); // Data atual
        $agora = now()->format('H:i:s'); // Hora atual

        $proximosagendamentos = Agendamento::where('profissional_id', $usuarioId)
            ->where(function ($query) use ($hoje, $agora) {
                $query->where('data_agendamento', '>', $hoje) // Agendamentos em datas futuras
                ->orWhere(function ($subQuery) use ($hoje, $agora) {
                    $subQuery->where('data_agendamento', $hoje)
                        ->where('hora_agendamento', '>=', $agora); // Agendamentos no mesmo dia com horário futuro
                });
            })
            ->orderBy('data_agendamento', 'asc')
            ->orderBy('hora_agendamento', 'asc') // Ordena também por hora
            ->take(5) // Limitando aos 5 mais próximos
            ->get();

        // Busca os pacientes acompanhados pelo profissional
        $pacientes = Paciente::whereHas('agendamento', function ($query) use ($usuarioId) {
            $query->where('profissional_id', $usuarioId);
        })->with(['usuario', 'agendamento' => function ($query) {
            $query->orderBy('data_agendamento', 'desc');
        }])->get()->map(function ($paciente) {
            return (object)[
                'nome_completo' => $paciente->usuario->nome_completo ?? 'N/A',
                'ultima_consulta' => $paciente->agendamento->first()->data_agendamento ?? 'N/A',
            ];
        });

        // Dados adicionais para exibição
        $estatisticas = [
            'pacientes_atendidos' => Agendamento::where('profissional_id', $usuarioId)
                ->where('data_agendamento', '<', now())
                ->count(),
            'proximos_agendamentos' => $proximosagendamentos->count(),
        ];

        // Feedbacks recentes recebidos pelo profissional
        /**$feedbacks = Feedback::where('profissional_id', $usuarioId)
         * ->with('paciente')
         * ->orderBy('created_at', 'desc')
         * ->take(5)
         * ->get();
         **/

        // Retorna a view com os dados necessários
        return view('profile.profissional-dashboard', [
            'proximosagendamentos' => $proximosagendamentos,
            'pacientes' => $pacientes,
            'estatisticas' => $estatisticas,
            //'feedbacks' => $feedbacks,
        ]);
    }
}
