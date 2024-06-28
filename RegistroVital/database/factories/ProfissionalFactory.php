<?php

namespace Database\Factories;

use App\Models\AtuaArea;
use App\Models\Especializacao;
use App\Models\Profissional;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Profissional>
 */
class ProfissionalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::where('role', 'medico')->inRandomOrder()->first() ?? User::factory()->create(['role' => 'medico']);

        $atuaarea = AtuaArea::inRandomOrder()->first() ?? AtuaArea::factory()->create();
        $especializacao = $atuaarea->especializacoes()->inRandomOrder()->first() ?? Especializacao::factory()->create(['area_id' => $atuaarea->id]);

        return [
            'user_id' => $user->id,
            'areaatuacao_id' => $atuaarea->id,
            'especializacao_id' => $especializacao->id,
            'nome' => $user->name,
            'email' => $user->email,
            'enderecoatuacao' => $this->faker->address,
            'localformacao' => $this->faker->address,
            'dataformacao' => $this->faker->date,
            'descricaoperfil' => $this->faker->text,
        ];
    }
}

