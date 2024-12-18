<?php

namespace Database\Seeders;

use App\Models\Paciente;
use App\Models\Profissional;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {

        Usuario::factory()->pacientePadrao()->create();
        Usuario::factory()->profissionalPadrao()->create();
        Usuario::factory()->administradorPadrao()->create();

        Usuario::factory()->count(30)->create()->each(function (Usuario $usuario) {

            if ($usuario->tipo_usuario === 1) {
                Paciente::factory()->create(['usuario_id' => $usuario->id]);
            }

            if ($usuario->tipo_usuario === 2) {
                Profissional::factory()->create(['usuario_id' => $usuario->id]);
            }
        });
    }
}

