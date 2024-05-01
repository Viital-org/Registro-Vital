<?php

namespace Database\Factories;

use App\Models\Paciente;
use App\Models\TipoAnotacao;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnotacaoSaude>
 */
class AnotacaoSaudeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pacientes = Paciente::all();
        $tipoanotacoes = TipoAnotacao::all();

        if ($pacientes->count() > 0) {
            $paciente = $pacientes->random();
            $pacienteid = $paciente->id;
        } else {
            $pacienteid = null;
        }


        if ($tipoanotacoes->count() > 0) {
            $tipoanotacao = $tipoanotacoes->random();
            $tipo_anotacao = $tipoanotacao->id;
        } else {
            $tipo_anotacao = null;
        }

        return [
        'paciente_id' => $pacienteid,
        'data_anotacao' => $this->faker->date,
        'tipo_anot' => $tipo_anotacao,
        'visibilidade' =>$this->faker->boolean(40),
        'anotacao' =>$this->faker->text,
        ];
    }
}
