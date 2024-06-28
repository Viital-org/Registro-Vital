<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $today = date('Y-m-d');

        if ($user->role === 'paciente') {
            $consultas = Consulta::where('paciente_id', $user->paciente->id)
                ->where('status', '!=', 'cancelada')
                ->where('data', '>=', $today)
                ->paginate(10);
        } elseif ($user->role === 'medico') {
            $consultas = Consulta::where('profissional_id', $user->profissional->id)
                ->where('status', '!=', 'cancelada')
                ->where('data', '>=', $today)
                ->paginate(10);
        } else {
            $consultas = collect();
        }

        Consulta::where('data', '<', $today)
            ->where('status', 'agendado')
            ->update(['status' => 'cancelada']);

        Consulta::where('data', '<', $today)
            ->where('status', 'confirmada')
            ->update(['status' => 'realizada']);

        $layout = $user->role === 'medico' ? 'LayoutsPadrao.layoutmedico' : ($user->role === 'paciente' ? 'LayoutsPadrao.layoutpaciente' : 'LayoutsPadrao.inicio');
        return view('consultas.listaconsultas', compact('consultas', 'layout'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $consulta = Consulta::findOrFail($id);

        if ($user->role === 'paciente' && $user->paciente->id === $consulta->paciente_id) {
            $consulta->update($request->validate([
                'status' => 'required|in:agendado,confirmada,cancelada',
            ]));

            return redirect()->route('consultas.index', $consulta->id)->with('success', 'Status atualizado com sucesso!');
        }

        return redirect()->route('consultas.index')->with('error', 'Você não tem permissão para atualizar esta consulta.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();
        $consulta = Consulta::findOrFail($id);

        $layout = $user->role === 'medico' ? 'LayoutsPadrao.layoutmedico' : ($user->role === 'paciente' ? 'LayoutsPadrao.layoutpaciente' : 'LayoutsPadrao.inicio');
        return view('consultas.showconsultas', compact('consulta', 'layout'));

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->delete();
        return redirect()->route('consultas.listaconsultas')->with('success', 'Consulta deletada com sucesso!');
    }
}
