<?php

namespace Database\Seeders;

use App\Models\TipoMeta;
use Illuminate\Database\Seeder;

class TipoMetaSeeder extends Seeder
{
    public function run()
    {
        $tiposMeta = [
            'Exercício',
            'Alimentação',
            'Sono',
            'Hidratação',
            'Medicação',
            'Bem-estar',
        ];

        foreach ($tiposMeta as $tipo) {
            TipoMeta::create(['descricao' => $tipo]);
        }
    }
}
