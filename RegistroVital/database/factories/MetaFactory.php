<?php

namespace Database\Factories;

use App\Models\Meta;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class MetaFactory extends Factory
{
    protected $model = Meta::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dataInicio = $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d');
        $dataFim = $this->faker->boolean ? $this->faker->dateTimeBetween($dataInicio, '+120 days')->format('Y-m-d') : null;


        $paciente = Paciente::inRandomOrder()->first();

        return [
            'paciente_id' => $paciente ? $paciente->id : null,
            'titulo_meta' => $this->faker->words(3, true),
            'descricao_meta' => $this->faker->optional()->sentence(),
            'data_inicio' => $dataInicio,
            'data_fim' => $dataFim,
            'situacao' => $this->faker->randomElement([0, 1]), // 0 = Incompleta, 1 = Completa
            'notificacao_diaria' => $this->faker->boolean,
        ];
    }
}



