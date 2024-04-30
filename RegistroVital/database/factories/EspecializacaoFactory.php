<?php

namespace Database\Factories;

use App\Models\Especializacao;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Especializacao>
 */
class EspecializacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'especializacao' => $this->faker->jobTitle,
            'tempoespecializacao' => $this->faker->numberBetween($min = 1, $max = 100),
            'descricao' => $this->faker->text,
        ];
    }
}
