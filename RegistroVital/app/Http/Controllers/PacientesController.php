<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            ->simplePaginate(5);;
        return view('Cadastros/listapacientes', ['pacientes' => $pacientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'meta_id' => 'nullable|exists:metas,id',
            // Adicione outras validações conforme necessário
        ]);

        $validated['user_id'] = Auth::id();
        $validated['nome'] = Auth::user()->name;
        $validated['email'] = Auth::user()->email;

        Paciente::create($validated);

        return redirect()->route('paciente.dashboard')->with('success', 'Paciente cadastrado com sucesso!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $metas = Meta::all();

        return view('Cadastros/cadastropacientes', [
            'user' => $user,
            'metas' => $metas
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->input('id');

        if ($id === null) {
            $pacientes = Paciente::all();
        } else {
            $pacientes = Paciente::where('id', '=', $id)->get();
        }

        return view('Cadastros/listapacientes', ['pacientes' => $pacientes]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();
        $paciente = Paciente::where('user_id', $user->id)->firstOrFail();

        return view('pacientes.edit', [
            'pacientes' => $paciente,
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $paciente = Paciente::where('user_id', $user->id)->firstOrFail();

        $validated = $request->validate([
            // Adicione as regras de validação para os campos que o paciente pode editar
        ]);

        $paciente->update($validated);

        return redirect()->route('paciente.dashboard')->with('success', 'Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();
        return redirect()->route('pacientes-index')->with('success', 'Paciente deletado com sucesso!');
    }

    public function tela()
    {
        return view('profile.paciente-dashboard');
    }
}

