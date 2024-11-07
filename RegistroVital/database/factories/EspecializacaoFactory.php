<?php

namespace Database\Factories;

use App\Models\AtuaArea;
use App\Models\Especializacao;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Especializacao>
 */
class EspecializacaoFactory extends Factory
{
    protected $model = Especializacao::class;

    /**
     * Define o estado padrão do modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descricao_especializacao' => $this->faker->unique()->word(),
            'area_atuacao_id' => AtuaArea::factory(),
        ];
    }
}
