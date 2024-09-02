<?php 
namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase 
{
    use RefreshDatabase;

    /** @test */ 
    public function paciente_autenticado_loga() 
    {
        $user = User::factory()->create(['role'=>'paciente']);

        $response = $this->actingAs($user)->get('/paciente/dashboard');

        $response->assertOk();
    }

    /** @test */
    public function profissional_autenticado_loga() 
    {
        $user = User::factory()->create(['role'=>'medico']);

        $response = $this->actingAs($user)->get('/medico/dashboard');

        $response->assertOk();
    }
}