<?php

namespace Database\Factories;

use App\Models\Consulta;
use App\Models\Especializacao;
use App\Models\Paciente;
use App\Models\Profissional;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agendamento>
 */
class AgendamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    
    public function definition(): array
    {
        
        $especializacoes = Especializacao::all();
        $profissionais = Profissional::all();
        $pacientes = Paciente::all();
        $consultas = Consulta::all();
        

        // Funcoes para buscar as chaves estrangeiras

        if ($especializacoes->count() > 0){
            $especializacao = $especializacoes->random();
            $especializacaoId = $especializacao->id;
        } else{
                $especializacaoId = 0;
        }

        if($profissionais->count() > 0){
            $profissional = $profissionais->random();
            $profissionalId = $profissional->id;
        } else{
            $profissionalId = 0;
        }
        
        if($pacientes->count() > 0){
            $paciente = $pacientes->random();
            $pacienteId = $paciente->id;
        } else{
            $pacienteId = 0;
        }
        
        if($consultas->count() > 0){
            $consulta = $consultas->random();
            $consultaData = $consulta->data;
            $consultaId = $consulta->id;
        } else {
            $consultaData = '1900-01-01';
            $consultaId = 0;
        }

        return [
        'especializacao_id' => $especializacaoId,
        'profissional_id' => $profissionalId,
        'paciente_id' => $pacienteId,
        'data_agendamento' => $consultaData,
        'consulta_id' => $consultaId,   
        ];

    }
}
