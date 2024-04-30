<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Especializacao>
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
