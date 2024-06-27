<?php

namespace Database\Factories;

use App\Models\Meta;
use App\Models\Paciente;
use App\Models\User;
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
        $user = User::where('role', 'paciente')->inRandomOrder()->first();
        $metas = Meta::all();
        if ($metas->count() > 0) {
            $meta = $metas->random();
            $metaId = $meta->id;
        } else {
            $metaId = null;
        }
        return [
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
        ];
    }
}
