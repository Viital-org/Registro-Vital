<?php

namespace Database\Seeders;

use App\Models\Dica;
use Illuminate\Database\Seeder;

class DicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dica::factory(10)->create();
    }
}
