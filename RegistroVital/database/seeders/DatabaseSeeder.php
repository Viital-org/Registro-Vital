<?php

namespace Database\Seeders;

use App\Models\TipoRecomendacao;
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
            AdministradorSeeder::class,
            ProfissionalSeeder::class,
            PacienteSeeder::class,
            TipoRecomendacaoSeeder::class,
            TipoAnotacaoSeeder::class,
            TipoDocumentoSeeder::class,
            TipoVisibilidadeSeeder::class,
            TipoLogSeeder::class,
            StatusSeeder::class,
            //MetaSeeder::class,
            //AtuaAreaSeeder::class,
            //EspecializacaoSeeder::class,
            //ConsultaSeeder::class,
            //DicaSeeder::class,
            //AnotacaosaudeSeeder::class,
            //AgendamentoSeeder::class,
            //UsuarioSeeder::class,
        ]);
    }
}

