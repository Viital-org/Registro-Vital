<?php

namespace Database\Seeders;

use App\Models\AtuaArea;
use Illuminate\Database\Seeder;

class AtuaAreaSeeder extends Seeder
{
    /**
     * Execute os seeds da tabela de áreas de atuação.
     */
    public function run(): void
    {
        $areasDeAtuacao = [
            'Cardiologia',
            'Dermatologia',
            'Endocrinologia',
            'Ginecologia',
            'Neurologia',
            'Oftalmologia',
            'Oncologia',
            'Ortopedia',
            'Pediatria',
            'Psiquiatria',
        ];

        foreach ($areasDeAtuacao as $area) {
            AtuaArea::create(['descricao_area' => $area]);
        }
    }
}

