<?php

namespace Database\Factories;

use App\Models\Profissional;
use App\Models\AtuaArea;
use App\Models\Especializacao;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfissionalFactory extends Factory
{
    protected $model = Profissional::class;

    public function definition(): array
    {

        $areaAtuacao = AtuaArea::inRandomOrder()->first();

        $especializacao = $areaAtuacao ? $areaAtuacao->especializacoes()->inRandomOrder()->first() : null;

        return [
            'usuario_id' => null,
            'cpf' => $this->faker->unique()->numerify('###########'),
            'cnpj' => $this->faker->unique()->numerify('############'),
            'registro_profissional' => $this->faker->word(),
            'area_atuacao_id' => $areaAtuacao ? $areaAtuacao->id : null,
            'especializacao_id' => $especializacao ? $especializacao->id : null,
            'genero' => $this->faker->randomElement(['M', 'F']),
            'tempo_experiencia' => $this->faker->numberBetween(0, 30),
            'data_criacao' => now(),
        ];
    }
}
