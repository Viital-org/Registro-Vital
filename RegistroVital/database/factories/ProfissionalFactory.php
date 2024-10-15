<?php

namespace Database\Factories;

use App\Models\Profissional;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfissionalFactory extends Factory
{
    protected $model = Profissional::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $user = Usuario::where('tipo_usuario', 2)->inRandomOrder()->first() ?? Usuario::factory()->create(['tipo_usuario' => 2]);

        return [
            'usuario_id' => $user->id,
            'cpf' => $this->faker->numerify('###########'),
            'cnpj' => $this->faker->numerify('##############'),
            'registro_profissional' => $this->faker->word(),
            'area_atuacao' => $this->faker->word(),
            'especializacao' => $this->faker->word(),
            'genero' => $this->faker->randomElement(['M', 'F']),
            'tempo_experiencia' => $this->faker->numberBetween(0, 30),
            'data_criacao' => $this->faker->dateTimeThisDecade(),
        ];
    }
}

