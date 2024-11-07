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
            TipoUsuarioSeeder::class,
            TipoRecomendacaoSeeder::class,
            TipoAnotacaoSeeder::class,
            TipoDocumentoSeeder::class,
            TipoVisibilidadeSeeder::class,
            TipoLogSeeder::class,
            TipoMetaSeeder::class,
            //EstadoCivilSeeder::class,
            AtuaAreaSeeder::class,
            EspecializacaoSeeder::class,
            UsuarioSeeder::class,
            AdministradorSeeder::class,
            ProfissionalSeeder::class,
            PacienteSeeder::class,
            StatusSeeder::class,
            //MetaSeeder::class,
            //ConsultaSeeder::class,
            //DicaSeeder::class,
            //AnotacaosaudeSeeder::class,
            //AgendamentoSeeder::class,

        ]);
    }
}

