<?php

namespace Database\Seeders;

use App\Models\EstadoCivil;
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
            TipoRecomendacaoSeeder::class,
            TipoAnotacaoSeeder::class,
            TipoDocumentoSeeder::class,
            TipoVisibilidadeSeeder::class,
            TipoLogSeeder::class,
            EstadoCivilSeeder::class,
            AtuaAreaSeeder::class,
            EspecializacaoSeeder::class,
            AdministradorSeeder::class,
            ProfissionalSeeder::class,
            PacienteSeeder::class,
            StatusSeeder::class,
            UsuarioSeeder::class,
            //MetaSeeder::class,
            //ConsultaSeeder::class,
            //DicaSeeder::class,
            //AnotacaosaudeSeeder::class,
            //AgendamentoSeeder::class,

        ]);
    }
}

