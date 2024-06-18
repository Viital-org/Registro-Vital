<?php
use App\Models\Profissional;
use Faker\Factory;

test('Testa se os profissionais estao sendo listados', function () {
   

    $response->assertStatus(200);
    $response->assertViewIs('cadastroslistaprofissionais');
});
