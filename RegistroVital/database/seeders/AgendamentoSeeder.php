<?php

namespace Database\Seeders;

use App\Models\Consulta;
use App\Models\Agendamento;
use Illuminate\Database\Seeder;

class AgendamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Agendamento::factory(Consulta::all())->create();
    }
}
