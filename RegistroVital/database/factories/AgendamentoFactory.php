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

        $especializacoes = Especializacao::all()->last();
        $profissionais = Profissional::all()->last();
        $pacientes = Paciente::all()->last();
        $consultas = Consulta::all()->last();

        if ($especializacoes->count() > 0){
            $especializacao = $especializacoes->last();
            $especializacaoId = $especializacao->id;
        } else{
                $especializacaoId = 0;
        }

        if($profissionais->count() > 0){
            $profissional = $profissionais->last();
            $profissionalId = $profissional->id;
        } else{
            $profissionalId = 0;
        }
        
        if($pacientes->count() > 0){
            $paciente = $pacientes->last();
            $pacienteId = $paciente->id;
        } else{
            $pacienteId = 0;
        }
        
        if($consultas->count() > 0){
            $consulta = $consultas->last();
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
