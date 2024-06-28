<?php

namespace Database\Factories;

use App\Models\Paciente;
use App\Models\Profissional;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $profissionais = Profissional::all();
        if ($profissionais->count() > 0) {
            $profissional = $profissionais->random();
            $profissionalId = $profissional->id;
        } else {
            $profissionalId = null;
        }

        $pacientes = Paciente::all();
        if ($pacientes->count() > 0) {
            $paciente = $pacientes->random();
            $pacienteId = $paciente->id;
        } else {
            $pacienteId = null;
        }

        return [
            'data' => $this->faker->date(),
            'status' => $this->faker->randomElement(['agendado', 'confirmada', 'realizada', 'cancelada']),
            'profissional_id' => $profissionalId,
            'paciente_id' => $pacienteId,
            'valor' => $this->faker->randomFloat(100, 7080),
        ];
    }
}

