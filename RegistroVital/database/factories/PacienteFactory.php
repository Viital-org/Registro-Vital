<?php

namespace Database\Factories;

use App\Models\Paciente;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = Usuario::where('tipo_usuario', 1)->inRandomOrder()->first() ?? Usuario::factory()->create(['tipo_usuario' => 1]);

        return [
            'usuario_id' => $user->id,
            'cpf' => $this->faker->unique()->numerify('###########'), // CPF
            'rg' => $this->faker->unique()->numerify('###########'), // RG
            'data_nascimento' => $this->faker->date(),
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
