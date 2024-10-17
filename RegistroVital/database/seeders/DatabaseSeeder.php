<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PacienteSeeder::class,
            AtuaAreaSeeder::class,
            EspecializacaoSeeder::class,
            ProfissionalSeeder::class,
            MetaSeeder::class,
            ConsultaSeeder::class,
            TipoAnotacaoSeeder::class,
            DicaSeeder::class,
            AnotacaosaudeSeeder::class,
            AgendamentoSeeder::class,
        ]);
    }
}

