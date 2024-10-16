<?php

namespace Database\Seeders;

use App\Models\Paciente;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    public function run(): void
    {

        Usuario::factory()->count(10)->create(['tipo_usuario' => 1])->each(function ($usuario) {

            Paciente::factory()->create(['usuario_id' => $usuario->id]);
        });
    }
}
