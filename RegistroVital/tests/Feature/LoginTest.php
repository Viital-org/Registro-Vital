<<<<<<< HEAD
<?php 
namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
=======
<?php

namespace Tests\Feature;

use App\Models\Usuario;
>>>>>>> develop
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase 
{
    use RefreshDatabase;

    /** @test */ 
    public function paciente_autenticado_loga() 
    {
<<<<<<< HEAD
        $user = User::factory()->create(['role'=>'paciente']);
=======
        $user = Usuario::factory()->create(['role' => 'paciente']);
>>>>>>> develop

        $response = $this->actingAs($user)->get('/paciente/dashboard');

        $response->assertOk();
    }

    /** @test */
    public function profissional_autenticado_loga() 
    {
<<<<<<< HEAD
        $user = User::factory()->create(['role'=>'medico']);
=======
        $user = Usuario::factory()->create(['role' => 'medico']);
>>>>>>> develop

        $response = $this->actingAs($user)->get('/medico/dashboard');

        $response->assertOk();
    }

    /** @test */
    public function paciente_nao_autenticado_loga()
    {
        $response = $this->get('/paciente/dashboard');

        $response->assertStatus(302);
    }

    /** @test */
    public function profissional_nao_autenticado_loga()
    {
        $response = $this->get('/medico/dashboard');

        $response->assertStatus(302);
    }
}