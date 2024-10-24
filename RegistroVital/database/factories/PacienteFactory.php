<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    protected $model = Paciente::class;

    public function definition(): array
    {
        return [
            'usuario_id' => null,
            'cpf' => $this->faker->unique()->numerify('###########'),
            'rg' => $this->faker->unique()->numerify('###########'),
            'data_nascimento' => $this->faker->date(),
            'bairro'=>$this->faker->streetName(),
            'rua_endereco' => $this->faker->streetName(),
            'numero_endereco' => $this->faker->numberBetween(1, 100),
            'cep' => $this->faker->numerify('########'),
            'cidade' => $this->faker->city(),
            'estado' => $this->faker->stateAbbr(),
            'genero' => $this->faker->randomElement(['M', 'F']),
            'estado_civil' => $this->faker->numberBetween(1, 5),
            'tipo_sanguineo' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']),
            'data_criacao' => now(),
        ];
    }
}
