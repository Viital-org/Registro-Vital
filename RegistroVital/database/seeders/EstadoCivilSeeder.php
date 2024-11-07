<?php

namespace Database\Seeders;

use App\Models\EstadoCivil;
use Illuminate\Database\Seeder;

class EstadoCivilSeeder extends Seeder
{
    public function run(): void
    {
        $estados_civis = ['solteiro(a)', 'casado(a)', 'divorciado(a)', 'viuvo(a)', 'união estável'];

        foreach ($estados_civis as $estados_civil) {
            EstadoCivil::create(['descricao' => $estados_civil]);
        }
    }
}
