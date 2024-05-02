<?php

namespace Database\Factories;

use App\Models\Meta;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Meta>
 */
class MetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        $dataInicio = $this->faker->dateTimeBetween(now(), now())->format('Y-m-d');

        $dataFim = $this->faker->dateTimeBetween($dataInicio, '+120 days')->format('Y-m-d');

        return [
            'meta' => $this->faker->word(),
            'data_inicio' => $dataInicio,
            'data_fim' => $dataFim,
            'descricao' => $this->faker->text(),
        ];
    }
}
