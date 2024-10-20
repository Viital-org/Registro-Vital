<?php

namespace Database\Factories;

use App\Models\AtuaArea;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AtuaArea>
 */
class AtuaAreaFactory extends Factory
{
    protected $model = AtuaArea::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descricao_area' => $this->faker->unique()->word(),
        ];
    }
}

