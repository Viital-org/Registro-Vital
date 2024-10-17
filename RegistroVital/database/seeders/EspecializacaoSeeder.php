<?php

namespace Database\Seeders;

use App\Models\Especializacao;
use Illuminate\Database\Seeder;

class EspecializacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Especializacao::factory(10)->create();
    }
}
