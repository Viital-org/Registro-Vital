<?php

namespace Database\Factories;

use App\Models\TipoAnotacao;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoAnotacaoFactory extends Factory
{
    protected $model = TipoAnotacao::class;

    public function definition(): array
    {
        return [
            'descricao_tipo' => $this->faker->randomElement([
                'alimentação',
                'atividade física',
                'geral',
                'saúde',
                'dental',
                'medicação',
                'descanso/sono'
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

