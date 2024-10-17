<?php

namespace Database\Factories;

use App\Models\TipoDocumento;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoDocumentoFactory extends Factory
{
    protected $model = TipoDocumento::class;

    public function definition()
    {
        return [
            'extensao_documento' => $this->faker->randomElement(['PDF', 'PNG', 'JPG', 'TXT', 'TSV', 'BMP']),
            'tamanho_maximo_kb' => $this->faker->numberBetween(100, 2048),
        ];
    }
}
