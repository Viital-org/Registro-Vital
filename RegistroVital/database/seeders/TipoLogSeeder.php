<?php

namespace Database\Seeders;

use App\Models\TipoLog;
use Illuminate\Database\Seeder;

class TipoLogSeeder extends Seeder
{
    public function run(): void
    {
        $logs = ['insert', 'delete', 'update', 'acesso'];

        foreach ($logs as $log) {
            TipoLog::firstOrCreate(['descricao' => $log]);
        }
    }
}
