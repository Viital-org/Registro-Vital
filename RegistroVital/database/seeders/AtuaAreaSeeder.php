<?php

namespace Database\Seeders;

use App\Models\AtuaArea;
use Illuminate\Database\Seeder;

class AtuaAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AtuaArea::factory()->count(10)->create();
    }
}

