<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Administrador $administrador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrador $administrador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administrador $administrador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrador $administrador)
    {
        //
    }

    public function tela()
    {
        return view('profile.administrador-dashboard');
    }
    public function listarProfissionais(Request $request)
    {
        $tipoUsuario = $request->input('tipo_usuario');

        $usuarios = Usuario::when($tipoUsuario, function ($query, $tipoUsuario) {
            return $query->where('tipo_usuario', $tipoUsuario);
        })->paginate(10);

        return view('Cadastros.Administrador.listaprofissionais', compact('usuarios', 'tipoUsuario'));
    }

    public function transformarEmAdministrador(Request $request, $id)
    {
        $profissional = Usuario::where('id', $id)->where('tipo_usuario', 2)->firstOrFail();

        $profissional->tipo_usuario = 3;
        $profissional->save();

        Administrador::create([
            'usuario_id' => $profissional->id,
            'data_criacao' => now(),
            'cargo' => $request->input('cargo'),
        ]);

        return redirect()->route('administrador.profissionais', ['tipo_usuario' => 2])->with('success', 'Profissional transformado em administrador com sucesso.');
    }

    public function showLogs(Request $request)
    {
        $type = $request->input('type');

        if ($type === 'profile-edit') {
            $logFilePath = storage_path('logs/user_activity.log');
        } elseif ($type === 'login-logout') {
            $logFilePath = storage_path('logs/auth.log');
        } else {
            $logFilePath = storage_path('logs/laravel.log');
        }

        if (File::exists($logFilePath)) {
            $logs = File::get($logFilePath);

            $filteredLogs = collect(explode(PHP_EOL, $logs))->map(function ($log) {
                preg_match('/\[(.*?)] (.*?): (.*)/', $log, $matches);

                if (count($matches) === 4) {
                    return [
                        'timestamp' => $matches[1],
                        'level' => $matches[2],
                        'message' => $matches[3]
                    ];
                }

                return null;
            })->filter();

            if ($type === 'profile-edit') {
                $filteredLogs = $filteredLogs->filter(function ($log) {
                    return str_contains($log['message'], 'Atualização de perfil');
                });
            } elseif ($type === 'login-logout') {
                $filteredLogs = $filteredLogs->filter(function ($log) {
                    return str_contains($log['message'], 'Login') || str_contains($log['message'], 'Logout');
                });
            }

            return view('Logs.administrador-logs', ['logs' => $filteredLogs]);
        } else {
            return view('Logs.administrador-logs', ['logs' => collect([])]);
        }
    }
}

