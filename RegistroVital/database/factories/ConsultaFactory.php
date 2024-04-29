<?php

namespace Database\Factories;

use App\Models\Profissional;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consulta>
 */
class ConsultaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'data' => $this->faker->date(),
        'status' => $this->faker->word,
        'profissional_id' => function () {
            return \App\Models\Profissional::factory()->create()->id;
        },
        'especialidade' => $this->faker->jobTitle,
        'paciente_id' => function () {
            return \App\Models\Paciente::factory()->create()->id;
        },
        'valor' => $this->faker->numberBetween(100,7080),
        ];
    }
}
