<?php

namespace Database\Factories;

<<<<<<< HEAD
use App\Models\AtuaArea;
use App\Models\Especializacao;
use App\Models\Profissional;
use App\Models\User;
=======
use App\Models\Especializacao;
use App\Models\Usuario;
use App\Models\AtuaArea;
use App\Models\Profissional;
>>>>>>> develop
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
<<<<<<< HEAD
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
=======

        $areaAtuacao = AtuaArea::inRandomOrder()->first();

        $especializacao = $areaAtuacao ? $areaAtuacao->especializacoes()->inRandomOrder()->first() : null;

        $usuario = Usuario::where('tipo_usuario',2)->InRandomOrder()->first();

        return [
            'usuario_id' => $usuario->id,
            'cpf' => $this->faker->unique()->numerify('###########'),
            'cnpj' => $this->faker->unique()->numerify('############'),
            'registro_profissional' => $this->faker->word(),
            'area_atuacao_id' => $areaAtuacao ? $areaAtuacao->id : null,
            'especializacao_id' => $especializacao ? $especializacao->id : null,
            'genero' => $this->faker->randomElement(['M', 'F']),
            'tempo_experiencia' => $this->faker->numberBetween(0, 30),
>>>>>>> develop
        ];
    }
}

