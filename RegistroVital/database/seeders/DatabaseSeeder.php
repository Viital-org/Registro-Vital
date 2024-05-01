<?php

namespace Database\Seeders;

use App\Models\TipoAnotacao;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            EspecializacaoSeeder::class,
            AtuaAreaSeeder::class,
            ProfissionalSeeder::class,
            PacienteSeeder::class,
<<<<<<< HEAD
            ConsultaSeeder::class,
            AgendamentoSeeder::class,
            TipoAnotacao::class,
=======
            DicaSeeder::class,
            ConsultaSeeder::class
>>>>>>> 59cddbf760597b0d30a090230c3e4c919d585731
        ]);

    }
}
