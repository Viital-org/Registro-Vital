<?php

namespace Database\Factories;


use App\Models\TipoAnotacao;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TipoAnotacao>
 */
class TipoAnotacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo_anotacao' => $this->faker->numberBetween(1, 14),
            'desc_anotacao' => $this->faker->text(20),
        ];
    }
}
