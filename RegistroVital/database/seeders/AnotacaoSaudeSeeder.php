<?php

namespace Database\Seeders;

use App\Models\Anotacaosaude;
use Illuminate\Database\Seeder;

class AnotacaoSaudeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AnotacaoSaude::factory(10)->create();
    }
}
