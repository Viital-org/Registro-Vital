<?php

namespace Database\Seeders;

use App\Models\Profissional;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class ProfissionalSeeder extends Seeder
{
    public function run(): void
    {

        Usuario::factory()->count(10)->create(['tipo_usuario' => 2])->each(function ($usuario) {

            Profissional::factory()->create(['usuario_id' => $usuario->id]);
        });
    }
}
