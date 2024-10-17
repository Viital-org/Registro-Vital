<?php

namespace Database\Seeders;

use App\Models\TipoRecomendacao;
use Illuminate\Database\Seeder;

class TipoRecomendacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoRecomendacao::factory()->create([
            'descricao' => 'Exercício',
            'gera_notificacao' => 'S',
        ]);

        TipoRecomendacao::factory()->create([
            'descricao' => 'Alimentação',
            'gera_notificacao' => 'N',
        ]);

        TipoRecomendacao::factory()->create([
            'descricao' => 'Encaminhamento',
            'gera_notificacao' => 'S',
        ]);

        TipoRecomendacao::factory()->create([
            'descricao' => 'Geral',
            'gera_notificacao' => 'N',
        ]);

        TipoRecomendacao::factory()->create([
            'descricao' => 'Medicação',
            'gera_notificacao' => 'S',
        ]);

        TipoRecomendacao::factory()->create([
            'descricao' => 'Terapia',
            'gera_notificacao' => 'N',
        ]);
    }
}
