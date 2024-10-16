<?php

namespace Database\Factories;

use App\Models\Profissional;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfissionalFactory extends Factory
{
    protected $model = Profissional::class;

    public function definition(): array
    {
        return [
            'usuario_id' => null,
            'cpf' => $this->faker->unique()->numerify('###########'),
            'cnpj' => $this->faker->unique()->numerify('############'),
            'registro_profissional' => $this->faker->word(),
            'area_atuacao' => $this->faker->word(),
            'especializacao' => $this->faker->word(),
            'genero' => $this->faker->randomElement(['M', 'F']),
            'tempo_experiencia' => $this->faker->numberBetween(0, 30),
            'data_criacao' => now(),
        ];
    }
}
