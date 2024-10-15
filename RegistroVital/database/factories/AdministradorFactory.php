<?php

namespace Database\Factories;

use App\Models\Administrador;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Administrador>
 */
class AdministradorFactory extends Factory
{
    protected $model = Administrador::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $user = Usuario::where('tipo_usuario', 3)->inRandomOrder()->first() ?? Usuario::factory()->create(['tipo_usuario' => 3]);

        return [
            'usuario_id' => $user->id,
            'cargo' => $this->faker->jobTitle(),
            'data_criacao' => now(),
        ];
    }
}
