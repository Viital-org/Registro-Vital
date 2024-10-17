<?php

namespace Database\Seeders;

use App\Models\TipoAnotacao;
use Illuminate\Database\Seeder;

class TipoAnotacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoAnotacao::factory(10)->create();
    }
}
