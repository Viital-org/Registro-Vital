<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Usuario::factory()
            ->count(5)
            ->create(['tipo_usuario' => 3])
            ->each(function ($user) {
                Administrador::factory()->create([
                    'usuario_id' => $user->id,
                ]);
            });
    }
}
