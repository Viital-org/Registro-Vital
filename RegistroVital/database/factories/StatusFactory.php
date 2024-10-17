<?php

namespace Database\Factories;

use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatusFactory extends Factory
{
    protected $model = Status::class;

    public function definition(): array
    {
        return [
            'descricao' => $this->faker->randomElement(['confirmado', 'cancelado']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

