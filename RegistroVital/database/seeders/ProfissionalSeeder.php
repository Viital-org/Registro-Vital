<?php

namespace Database\Seeders;

use App\Models\Profissional;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class ProfissionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profissionais = Usuario::where('tipo_usuario', 2)->get();

        foreach ($profissionais as $user) {
            Profissional::factory()->create([
                'usuario_id' => $user->id,

            ]);
        }
    }
}
