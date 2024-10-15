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
            'descricao' => $this->faker->randomElement([
                'Paciente',
                'Profissional',
                'Administrador',
            ]),
        ];
    }
}
