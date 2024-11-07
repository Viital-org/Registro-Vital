<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EstadoCivilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descricao' => ([
                'solteiro(a)',
                'casado(a)',
                'divorciado(a)',
                'viuvo(a)',
                'união estável',

            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
