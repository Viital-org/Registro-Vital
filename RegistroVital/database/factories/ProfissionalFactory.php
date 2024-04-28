<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
        return [
        'areaatuacao' => $this->faker->jobTitle,
        'nome' => $this->faker->name,
        'email' =>$this->faker->safeEmail,
        'enderecoatuacao' =>$this->faker->address,
        'localformacao' =>$this->faker->address,
        'dataformacao' => $this->faker->date,
        'descricaoperfil' => $this->faker->text,
        ];
    }
}
