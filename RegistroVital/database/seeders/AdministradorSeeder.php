<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class AdministradorSeeder extends Seeder
{
    public function run()
    {

        Usuario::factory()->count(10)->create(['tipo_usuario' => 3])->each(function ($usuario) {

            Administrador::factory()->create(['usuario_id' => $usuario->id]);
        }
        );
    }
}

