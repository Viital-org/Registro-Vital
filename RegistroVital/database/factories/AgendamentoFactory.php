<?php

namespace Database\Factories;

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

    c
    public function definition(): array
    {
        return [
        'especialidade'=>$this->faker->jobTitle, // Adicionar chave estrangeira
        'idprofissional'=>$this->faker->number
        'idpaciente',
        'data'
        'consulta',
        ];
    }
}
