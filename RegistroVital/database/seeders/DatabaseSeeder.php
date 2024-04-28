<?php

namespace Database\Seeders;

use App\Models\Paciente;
use App\Models\Profissional;
use Database\Factories\ProfissionaisFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Profissional::factory(10)->create();
        Paciente::factory(10)->create();
    }
}
