<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoAnotacao;

class TipoAnotacaoSeeder extends Seeder
{
    public function run(): void
    {
        $tiposAnotacao = [
            'alimentação',
            'atividade física',
            'geral',
            'saúde',
            'dental',
            'medicação',
            'descanso/sono',
        ];

        foreach ($tiposAnotacao as $tipo) {
            TipoAnotacao::create([
                'descricao_tipo' => $tipo,
            ]);
        }
    }
}
