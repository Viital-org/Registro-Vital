<?php

namespace Database\Factories;

use App\Models\AtuaArea;
use App\Models\Especializacao;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Especializacao>
 */
class EspecializacaoFactory extends Factory
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
            'especializacao' => $this->faker->jobTitle,
            'tempoespecializacao' => $this->faker->numberBetween(1, 100),
            'area_id' => $atuaareaId,
            'descricao' => $this->faker->text,
        ];
    }
}
