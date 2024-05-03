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
            AtuaAreaSeeder::class,
            EspecializacaoSeeder::class,
            ProfissionalSeeder::class,
            MetaSeeder::class,
            PacienteSeeder::class,
            ConsultaSeeder::class,
            TipoAnotacaoSeeder::class,
            DicaSeeder::class,
            AnotacaoSaudeSeeder::class,
            MetaSeeder::class,
            //AgendamentoSeeder::class,
        ]);

    }
}
