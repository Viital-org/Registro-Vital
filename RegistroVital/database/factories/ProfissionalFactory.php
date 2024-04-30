<?php

namespace Database\Factories;

use App\Models\AtuaArea;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profissional>
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
        $atuaareas = AtuaArea::all();
        if ($atuaareas->count() > 0) {
            $atuaarea = $atuaareas->random();
            $atuaareaId = $atuaarea->id;
        } else {
            $atuaareaId = null;
        }

        return [
        'areaatuacao_id' => $atuaareaId,
        'nome' => $this->faker->name,
        'email' =>$this->faker->safeEmail,
        'enderecoatuacao' =>$this->faker->address,
        'localformacao' =>$this->faker->address,
        'dataformacao' => $this->faker->date,
        'descricaoperfil' => $this->faker->text,
        ];
    }
}
