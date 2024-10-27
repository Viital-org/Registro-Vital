<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use App\Models\Paciente;
use App\Models\TipoMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MetasController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $paciente = Paciente::where('usuario_id', $user->id)->firstOrFail();

        $metasPendentes = Meta::where('paciente_id', $paciente->usuario_id)
            ->where('situacao', 0)
            ->get();

        $metasIniciadas = Meta::where('paciente_id', $paciente->usuario_id)
            ->where('situacao', 1)
            ->get();

        $metasConcluidas = Meta::where('paciente_id', $paciente->usuario_id)
            ->where('situacao', 2)
            ->get();

        return view('metas.listametas', compact('metasPendentes', 'metasIniciadas', 'metasConcluidas'));
    }

    public function create()
    {
        $tiposMetas = TipoMeta::all();
        return view('metas.cadastrometas', compact('tiposMetas'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateMeta($request);
        $validatedData['paciente_id'] = Paciente::where('usuario_id', Auth::id())->firstOrFail()->usuario_id;
        $validatedData['situacao'] = 0;
        $validatedData['progresso_atual'] = 0;
        $validatedData['indefinida'] = $request->has('indefinido');

        if ($validatedData['indefinida']) {
            $validatedData['data_fim'] = null;
        }

        Meta::create($validatedData);

        return redirect()->route('metas.index')->with('success', 'Meta criada com sucesso!');
    }

    public function show(Meta $meta)
    {
        $periodo = [
            'inicio' => \Carbon\Carbon::parse($meta->data_inicio)->format('d/m/Y'),
            'fim' => $meta->data_fim ? \Carbon\Carbon::parse($meta->data_fim)->format('d/m/Y') : 'Em andamento',
        ];

        $maiorSequencia = $meta->maior_sequencia;
        $tipoMeta = $meta->tipoMeta;

        return view('metas.visualizarmeta', compact('meta', 'periodo', 'maiorSequencia', 'tipoMeta'));
    }
    public function edit(Meta $meta)
    {
        $tiposMetas = TipoMeta::all();
        return view('metas.editarmeta', compact('meta', 'tiposMetas'));
    }

    public function update(Request $request, Meta $meta)
    {

        $validarupdate = $request->validate([
            'titulo_meta' => 'required|string|max:255',
            'descricao_meta' => 'required|string',
        ]);

        $meta->update($validarupdate);

        return redirect()->route('metas.index')->with('success', 'Meta atualizada com sucesso!');
    }

    public function destroy(Meta $meta)
    {
        $meta->delete();
        return redirect()->route('metas.index')->with('success', 'Meta excluída com sucesso!');
    }
    public function start($id)
    {
        $meta = Meta::findOrFail($id);


        if ($meta->situacao === 0) {
            $meta->situacao = 1;
            $meta->save();
        }

        return redirect()->route('metas.index')->with('success', 'Meta iniciada com sucesso!');
    }
    public function complete(Meta $meta)
    {
        if ($meta->situacao != 2) {
            $meta->situacao = 2;
            $meta->save();
            return redirect()->route('metas.index')->with('success', 'Meta marcada como concluída!');
        }

        return redirect()->route('metas.index')->with('error', 'A meta já está concluída.');
    }
    public function increment(Meta $meta)
    {
        if ($meta->progresso_atual < $meta->quantidade_alvo) {
            $meta->progresso_atual += 1;
            $meta->save();
            return redirect()->route('metas.index')->with('success', 'Progresso da meta incrementado com sucesso.');
        }

        return redirect()->route('metas.index')->with('error', 'Não é possível incrementar o progresso, meta já atingida.');
    }

    private function validateMeta(Request $request)
    {
        return $request->validate([
            'titulo_meta' => 'required|string|max:20',
            'descricao_meta' => 'nullable|string|max:80',
            'tipo_meta_id' => 'required|exists:tipo_metas,id',
            'data_inicio' => 'required|date|after_or_equal:today',
            'data_fim' => 'nullable|date|after:data_inicio',
            'unidade_metrica' => 'required|string|max:20',
            'quantidade_alvo' => 'required|integer|min:1',
        ]);
    }
}
