<?php

namespace Database\Factories;

use App\Models\Especializacao;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AtuaArea>
 */
class AtuaAreaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $especializacoes = Especializacao::all();
        if ($especializacoes->count() > 0) {
            $especializacao = $especializacoes->random();
            $especializacaoId = $especializacao->id;
        } else {
            $especializacaoId = null;
        }

        return [
            'area' => $this->faker->jobTitle(),
            'especializacao_id' => $especializacaoId,
            'descricao' => $this->faker->text,
        ];
    }
}
