<?php

namespace App\Http\Controllers;

use App\Models\AtuaArea;
use App\Models\Especializacao;
use Illuminate\Http\Request;

class AtuaAreasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $atuaareas = AtuaArea::leftJoin('especializacoes', 'atuaareas.especializacao_id', '=', 'especializacoes.id')
            ->select('atuaareas.*', 'especializacoes.especializacao')
            ->orderBy('atuaareas.created_at')
            ->get();
        return view('Cadastros/listaatuaareas', ['atuaareas' => $atuaareas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        AtuaArea::create($request->all());
        return redirect()->route('atuaareas-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $especializacoes = Especializacao::all();
        return view('Cadastros/cadastroatuaareas', ['especializacoes' => $especializacoes]);
    }

    /**
     * Display the specified resource.
     */
    public function show(AtuaArea $atuaArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $atuaarea = AtuaArea::find($id);
        $especializacoes = Especializacao::all();
        return view('Cadastros/editaratuaarea', ['atuaareas' => $atuaarea, 'especializacoes' => $especializacoes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $atuaarea = AtuaArea::findorfail($id);
        $atuaarea->update($request->all());
        return redirect()->route('atuaareas-index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $atuaarea = AtuaArea::findorfail($id);
        $atuaarea->delete();
        return redirect()->route('atuaareas-index');
    }
}
