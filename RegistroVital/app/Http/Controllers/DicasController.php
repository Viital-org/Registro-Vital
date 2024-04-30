<?php

namespace App\Http\Controllers;

use App\Models\Dica;
use App\Models\Paciente;
use Illuminate\Http\Request;

class DicasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dicas = Dica::join('pacientes', 'dicas.paciente_id', '=', 'pacientes.id')
            ->select('dicas.*', 'pacientes.nome as nome_paciente')
            ->orderBy('dicas.created_at')
            ->get();
        return view('Cadastros/listadicas', ['dicas' => $dicas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::all();
        return view('Cadastros/cadastrodicas', ['pacientes' => $pacientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Dica::create($request->all());
        return redirect()->route('dicas-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dica $dica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dica = Dica::find($id);
        $pacientes = Paciente::all();
        return view('Cadastros/editardica', ['dicas' => $dica, 'pacientes' => $pacientes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dica = Dica::findorfail($id);
        $dica->update($request->all());
        return redirect()->route('dicas-index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dica = Dica::findorfail($id);
        $dica->delete();
        return redirect()->route('dicas-index');
    }
}
