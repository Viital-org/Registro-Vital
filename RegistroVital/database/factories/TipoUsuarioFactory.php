<?php

namespace Database\Factories;

use App\Models\TipoUsuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoUsuarioFactory extends Factory
{
    protected $model = TipoUsuario::class;

    public function definition()
    {
        return [
            'id' => $this->faker->randomElement([
                '0',
                '1',
                '2',
            ]),
        ];
    }
}
