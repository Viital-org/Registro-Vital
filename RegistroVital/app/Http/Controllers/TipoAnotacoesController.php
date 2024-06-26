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
        $validatedData = $request->validate([
            'tipo_anotacao' => 'required|integer',
            'desc_anotacao' => 'required|string|max:255',
        ]);

        TipoAnotacao::create($validatedData);

        return redirect()->route('tipoanotacao-index');
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
        $id = $request->input('search_id');

        if ($id === null) {
            $tipoanotacao = TipoAnotacao::paginate(5);
        } else {
            $tipoanotacao = TipoAnotacao::where('id', '=', $id)->paginate(5);
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
        return redirect()->route('tipoanotacao-index');
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
