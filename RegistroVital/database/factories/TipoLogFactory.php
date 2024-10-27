<?php

namespace Database\Factories;

use App\Models\TipoMeta;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoLogFactory extends Factory
{
    protected $model = TipoMeta::class;

    public function definition(): array
    {
        return [
            'descricao' => $this->faker->randomElement(['insert', 'delete', 'update', 'acesso']),
        ];
    }
}

