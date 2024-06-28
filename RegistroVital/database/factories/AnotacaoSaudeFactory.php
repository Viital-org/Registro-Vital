<?php

namespace Database\Factories;

use App\Models\Anotacaosaude;
use App\Models\Paciente;
use App\Models\TipoAnotacao;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Anotacaosaude>
 */
class AnotacaoSaudeFactory extends Factory
{
    protected $model = Anotacaosaude::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $paciente = Paciente::inRandomOrder()->first();
        $tipoanotacao = TipoAnotacao::inRandomOrder()->first();

        return [
            'paciente_id' => $paciente ? $paciente->id : null,
            'data_anotacao' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'tipo_anot' => $tipoanotacao ? $tipoanotacao->id : null,
            'visibilidade' => $this->faker->randomElement(['Visivel', 'Escondido']),
            'anotacao' => $this->faker->text,
        ];
    }
}
