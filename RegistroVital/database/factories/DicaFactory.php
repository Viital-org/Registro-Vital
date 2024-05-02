<?php

namespace Database\Factories;

use App\Models\Dica;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Dica>
 */
class DicaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pacientes = Paciente::all();
        if ($pacientes->count() > 0) {
            $paciente = $pacientes->random();
            $pacienteId = $paciente->id;
        } else {
            $pacienteId = null;
        }

        return [
            'dica' => $this->faker->word(),
            'paciente_id' => $pacienteId,
            'descricao' => $this->faker->text,
        ];
    }
}
