<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('Cadastros/listapacientes', compact('pacientes'), ['pacientes' => $pacientes]);
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
        return view('Cadastros/cadastroPacientes');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paciente = Paciente::find($id);
        return view('Cadastros/editarpaciente', compact('paciente'));
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
