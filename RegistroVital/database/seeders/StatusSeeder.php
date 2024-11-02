<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $statusList = [
            ['descricao' => 'confirmado'],
            ['descricao' => 'cancelado'],
            ['descricao' => 'pendente'],
        ];

        foreach ($statusList as $status) {
            Status::create($status);
        }
    }
}

