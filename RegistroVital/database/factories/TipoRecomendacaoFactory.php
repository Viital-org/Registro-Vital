<?php

namespace Database\Factories;

use App\Models\TipoRecomendacao;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoRecomendacaoFactory extends Factory
{
    protected $model = TipoRecomendacao::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'descricao' => $this->faker->randomElement(['Exercício', 'Alimentação', 'Encaminhamento', 'Geral', 'Medicação', 'Terapia']),
            'gera_notificacao' => $this->faker->randomElement(['S', 'N']),
        ];
    }
}
