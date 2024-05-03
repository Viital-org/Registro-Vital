<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::leftJoin('metas', 'pacientes.meta_id', '=', 'metas.id')
            ->select('pacientes.*', 'metas.meta')
            ->orderBy('pacientes.created_at')
            ->get();
        return view('Cadastros/listapacientes', ['pacientes' => $pacientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Paciente::create($request->all());
        return redirect()->route('pacientes-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $metas = Meta::all();
        return view('Cadastros/cadastropacientes', ['metas' => $metas]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->input('id');

        if ($id === null) {
            $pacientes = Paciente::all();
        } else{
            $pacientes = Paciente::all()->where('id','=', $id);
        }
        return view('Cadastros/listapacientes', ['pacientes' => $pacientes]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paciente = Paciente::find($id);
        $metas = Meta::all();
        return view('Cadastros/editarpaciente', ['paciente' => $paciente, 'metas' => $metas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $paciente = Paciente::findorfail($id);
        $paciente->update($request->all());
        return redirect()->route('pacientes-index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paciente = Paciente::findorfail($id);
        $paciente->delete();
        return redirect()->route('pacientes-index');
    }
}
