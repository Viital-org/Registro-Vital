<?php

namespace Database\Seeders;

use App\Models\Meta;
use Illuminate\Database\Seeder;

class MetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
<<<<<<< HEAD
        Meta::factory(10)->create();
=======
        Meta::factory()->count(10)->create();
>>>>>>> develop
    }
}
