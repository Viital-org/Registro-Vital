<?php

namespace Database\Seeders;

use App\Models\TipoVisibilidade;
use Illuminate\Database\Seeder;

class TipoVisibilidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $visibilidades = [
            ['descricao' => 'visivel'],
            ['descricao' => 'oculto'],
        ];

        foreach ($visibilidades as $visibilidade) {
            TipoVisibilidade::create($visibilidade);
        }
    }
}
