<?php

namespace Database\Factories;

use App\Models\AtuaArea;
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
        $atuaareaId = null;
        $especializacaoId = null;

        $user = User::where('role', 'medico')->inRandomOrder()->first();

        $atuaareas = AtuaArea::all();
        if ($atuaareas->count() > 0) {

            $atuaarea = $atuaareas->random();
            $atuaareaId = $atuaarea->id;
            $especializacoes = $atuaarea->especializacoes;

            if ($especializacoes->count() > 0) {

                $especializacao = $especializacoes->random();
                $especializacaoId = $especializacao->id;

            } else {
                $especializacaoId = null;
            }

        } else {
            $atuaareaId = null;
        }

        return [
            'user_id' => $user->id,
            'areaatuacao_id' => $atuaareaId,
            'especializacao_id' => $especializacaoId,
            'nome' => $user->name,
            'email' => $user->email,
            'enderecoatuacao' => $this->faker->address,
            'localformacao' => $this->faker->address,
            'dataformacao' => $this->faker->date,
            'descricaoperfil' => $this->faker->text,
        ];
    }
}
