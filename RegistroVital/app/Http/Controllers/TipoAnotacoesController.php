<?php

namespace App\Http\Controllers;

use App\Models\TipoAnotacao;
use Illuminate\Http\Request;

class TipoAnotacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoanotacao = TipoAnotacao::simplePaginate(5);
        return view('Cadastros/listatipoanotacoes', ['tipoanotacao' => $tipoanotacao]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'descricao_tipo' => 'required|string|max:255',
        ]);

        TipoAnotacao::create($validated);

        return redirect()->route('tipoanotacao-create')->with('success', 'Tipo de anotação cadastrado');
    }

    public function create()
    {
        return view('Cadastros/cadastrotipoanotacoes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $desctipo = $request->input('tipoanot');

        if ($desctipo === null) {
            $tipoanotacao = TipoAnotacao::paginate(5);
        } else {
            $tipoanotacao = TipoAnotacao::where('descricao_tipo', 'like', '%' . $desctipo . '%')->paginate(5);
        }

        return view('Cadastros.listatipoanotacoes', ['tipoanotacao' => $tipoanotacao]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Tipoanotacao = TipoAnotacao::find($id);
        return view('Cadastros/editartipoanotacao', ['Tipoanotacao' => $Tipoanotacao]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tipodeanotacao = TipoAnotacao::findorfail($id);
        $tipodeanotacao->update($request->all());
        return redirect()->route('tipoanotacao-index')->with('success', 'Tipo de anotação atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tipodeanotacao = TipoAnotacao::findorfail($id);
        $tipodeanotacao->delete();
        return redirect()->route('tipoanotacao-index');
    }
}
