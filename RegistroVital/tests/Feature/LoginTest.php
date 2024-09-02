<?php 
namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase 
{
    use RefreshDatabase;

    /** @test */ 
    public function usuario_loga() 
    {
        $user = User::factory()->create();

        $response = $this
        ->actingAs($user)
        ->get('/paciente/dashboard');

        $response->assertOk();
    }
}