<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obter todos os pacientes com as metas associadas
        $pacientes = Paciente::with('usuario')
            ->orderBy('created_at')
            ->simplePaginate(5);

        return view('Cadastros/listapacientes', ['pacientes' => $pacientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados do paciente
        $validated = $request->validate([
            'cpf' => 'required|string|max:14|unique:pacientes',
            'rg' => 'nullable|string|max:12',
            'data_nascimento' => 'required|date',
            'rua_endereco' => 'required|string|max:255',
            'numero_endereco' => 'required|string|max:10',
            'cep' => 'required|string|max:9',
            'cidade' => 'required|string|max:50',
            'estado' => 'required|string|max:2',
            'genero' => 'required|string|max:10',
            'estado_civil' => 'nullable|string|max:15',
            'tipo_sanguineo' => 'nullable|string|max:3',
            'meta_id' => 'nullable|exists:metas,id',
        ]);

        // Associar o usuário autenticado como o proprietário do paciente
        $validated['usuario_id'] = Auth::id();

        // Criar o paciente
        Paciente::create($validated);

        return redirect()->route('paciente.dashboard')->with('success', 'Paciente cadastrado com sucesso!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obter metas para o formulário
        $metas = Meta::all();

        return view('Cadastros/cadastropacientes', [
            'metas' => $metas,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $paciente = Paciente::with('usuario')->findOrFail($id);
        return view('Cadastros/showpaciente', ['paciente' => $paciente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paciente = Paciente::with('usuario')->findOrFail($id);
        $metas = Meta::all();

        return view('Cadastros/editpaciente', [
            'paciente' => $paciente,
            'metas' => $metas,
        ]);
    }

    public function update(Request $request, $id)
    {
        $paciente = Paciente::findOrFail($id);

        // Validação dos dados do paciente
        $validated = $request->validate([
            'cpf' => 'required|string|max:14|unique:pacientes,cpf,' . $paciente->id,
            'rg' => 'nullable|string|max:12',
            'data_nascimento' => 'required|date',
            'rua_endereco' => 'required|string|max:255',
            'numero_endereco' => 'required|string|max:10',
            'cep' => 'required|string|max:9',
            'cidade' => 'required|string|max:50',
            'estado' => 'required|string|max:2',
            'genero' => 'required|string|max:10',
            'estado_civil' => 'nullable|string|max:15',
            'tipo_sanguineo' => 'nullable|string|max:3',
            'meta_id' => 'nullable|exists:metas,id',
        ]);

        // Atualizar os dados do paciente
        $paciente->update($validated);


        return redirect()->route('paciente.dashboard')->with('success', 'Dados do paciente atualizados com sucesso!');

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
