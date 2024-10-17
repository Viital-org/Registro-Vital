<?php

namespace Database\Seeders;

use App\Models\Usuario;
use App\Models\Paciente;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {

        Usuario::factory()->count(30)->create()->each(function (Usuario $usuario) {

            if ($usuario->tipo_usuario === 1) {
                Paciente::factory()->create(['usuario_id' => $usuario->id]);
            }
        });
    }
}

