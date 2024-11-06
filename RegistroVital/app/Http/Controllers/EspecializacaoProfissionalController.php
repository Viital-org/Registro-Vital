<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\AtuaArea;
use App\Models\Endereco;
use App\Models\Especializacao;
use App\Models\EspecializacaoProfissional;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EspecializacaoProfissionalController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $especializacoesprofissional = EspecializacaoProfissional::where('profissional_id', $user->id)
            ->with(['especializacoes', 'areas_atuacao', 'enderecos'])
            ->paginate(5);

        return view('EspecializacoesProfissionais.ListaEspecializacoesProfissionais', compact('especializacoesprofissional'));
    }


    public function create()
    {
        $areas_atuacao= EspecializacaoProfissional::getAreaAtuacao();

        return view('Especializacoesprofissionais.especializacoesprofissional', compact('areas_atuacao'));
    }


    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'area_atuacao_id' => 'required|exists:areas_atuacao,id',
            'especializacao_id' => 'required|exists:especializacoes,id',
            'rqe' => 'required|string',
            'valor_consulta' => 'required|numeric',
            'cep' => 'required|string',
            'uf' => 'required|string',
            'cidade' => 'required|string',
            'bairro' => 'required|string',
            'rua' => 'required|string',
            'numero' => 'required|numeric']);

        EspecializacaoProfissional::cadastraEndereco($user, $validated, $request);

        return redirect()->route('minhasespecializacoes.index')->with('success', 'Especialização criada com sucesso!');

    }

    public function show(EspecializacaoProfissional $especializacaoProfissional)
    {
        //
    }

    public function edit(EspecializacaoProfissional $especializacaoProfissional)
    {
        //
    }

    public function getEspecializacoes($area_atuacao_id): JsonResponse
    {
        $especializacoes = Especializacao::where('area_atuacao_id', $area_atuacao_id)->get();
        return response()->json($especializacoes);

    }

    public function update(Request $request, EspecializacaoProfissional $especializacaoProfissional)
    {

    }


    public function destroy($id)
    {
        $especializacaoProfissional = EspecializacaoProfissional::findOrFail($id);
        $especializacaoProfissional->delete();
        return redirect()->route('minhasespecializacoes.index')->with('success', 'Especialização deletada com sucesso!');
    }
}
