<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoUsuario;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoUsuario::factory()->create([
            'id' => 1,
            'descricao' => 'Paciente',
        ]);

        TipoUsuario::factory()->create([
            'id' => 2,
            'descricao' => 'Profissional',
        ]);

        TipoUsuario::factory()->create([
            'id' => 3,
            'descricao' => 'Administrador',
        ]);
    }
}
