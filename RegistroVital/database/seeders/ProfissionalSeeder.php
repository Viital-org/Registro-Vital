<?php

namespace Database\Seeders;

use App\Models\Profissional;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProfissionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $profissionais = User::where('role', 'medico')->get();
        foreach ($profissionais as $user) {
            Profissional::factory()->create([
                'user_id' => $user->id,
                'nome' => $user->name,
                'email' => $user->email,
            ]);
        }
    }
}
