<?php

namespace Database\Factories;

use App\Models\AtuaArea;
use App\Models\Especializacao;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AtuaArea>
 */
class AtuaAreaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'area' => $this->faker->jobTitle(),
            'descricao' => $this->faker->text,
        ];
    }
}
