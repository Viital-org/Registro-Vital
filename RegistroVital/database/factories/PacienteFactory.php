<?php

namespace Database\Factories;

use App\Models\Meta;
use App\Models\Paciente;
<<<<<<< HEAD
<<<<<<< HEAD
use App\Models\User;
=======
use App\Models\Usuario;
>>>>>>> develop
=======
>>>>>>> develop
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
        $user = User::where('role', 'paciente')->inRandomOrder()->first() ?? User::factory()->create(['role' => 'paciente']);
        $metas = Meta::all();
        if ($metas->count() > 0) {
            $meta = $metas->random();
            $metaId = $meta->id;
        } else {
            $metaId = null;
        }
        return [
<<<<<<< HEAD
            'user_id' => $user->id,
            'nome' => $user->name,
            'email' => $user->email,
            'datanascimento' => $this->faker->date,
            'cep' => $this->faker->postcode(),
            'endereco' => $this->faker->address,
            'numcartaocred' => $this->faker->creditCardNumber(),
            'hobbies' => $this->faker->text,
            'doencascronicas' => $this->faker->word,
            'remediosregulares' => $this->faker->word,
            'meta_id' => $metaId,
=======
            'usuario_id' => null,
            'cpf' => $this->faker->unique()->numerify('###########'),
            'rg' => $this->faker->unique()->numerify('###########'),
            'data_nascimento' => $this->faker->date(),
            'bairro' => $this->faker->streetName(),
            'rua_endereco' => $this->faker->streetName(),
            'numero_endereco' => $this->faker->numberBetween(1, 100),
            'cep' => $this->faker->numerify('########'),
            'cidade' => $this->faker->city(),
            'estado' => $this->faker->stateAbbr(),
            'genero' => $this->faker->randomElement(['M', 'F']),
            'estado_civil' => $this->faker->numberBetween(1, 5),
            'tipo_sanguineo' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']),
<<<<<<< HEAD
            'created_at'=> now(),
            'updated_at'=> now(),
>>>>>>> develop
=======
            'created_at' => now(),
            'updated_at' => now(),
>>>>>>> develop
        ];
    }
}
