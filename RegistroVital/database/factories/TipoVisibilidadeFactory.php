<?php

namespace Database\Factories;

use App\Models\TipoVisibilidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoVisibilidadeFactory extends Factory
{
    protected $model = TipoVisibilidade::class;

    public function definition(): array
    {
        return [
            'descricao' => $this->faker->randomElement(['visivel', 'oculto']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
