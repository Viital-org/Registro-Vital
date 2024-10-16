<?php

namespace Database\Factories;

use App\Models\Administrador;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdministradorFactory extends Factory
{
    protected $model = Administrador::class;

    public function definition(): array
    {
        return [
            'usuario_id' => null,
            'cargo' => $this->faker->word(),
            'data_criacao' => now(),
        ];
    }
}
