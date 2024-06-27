<?php

namespace Database\Seeders;

use App\Models\Paciente;
use App\Models\User;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pacientes = User::where('role', 'paciente')->get();
        foreach ($pacientes as $user) {
            Paciente::factory()->create([
                'user_id' => $user->id,
                'nome' => $user->name,
                'email' => $user->email,
            ]);
        }
    }
}
