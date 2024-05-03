<?php

namespace Database\Factories;

use App\Models\Meta;
use App\Models\Paciente;
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
        $metas = Meta::all();
        if ($metas->count() > 0) {
            $meta = $metas->random();
            $metaId = $meta->id;
        } else {
            $metaId = null;
        }
        return [
            'nome' => $this->faker->name,
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
