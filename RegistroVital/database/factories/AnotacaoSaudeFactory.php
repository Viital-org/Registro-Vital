<?php

namespace Database\Factories;

use App\Models\Anotacaosaude;
use App\Models\Paciente;
use App\Models\TipoAnotacao;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Anotacaosaude>
 */
class AnotacaoSaudeFactory extends Factory
{
    protected $model = Anotacaosaude::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $paciente = Paciente::inRandomOrder()->first();
        $tipoanotacao = TipoAnotacao::inRandomOrder()->first();

        return [
            'paciente_id' => Paciente::factory(),
            'tipo_anotacao' => TipoAnotacao::factory(),
            'descricao_anotacao' => $this->faker->text(100),
            'tipo_visibilidade' => $this->faker->boolean,
            'possui_documento' => $this->faker->boolean,
        ];
    }
}
