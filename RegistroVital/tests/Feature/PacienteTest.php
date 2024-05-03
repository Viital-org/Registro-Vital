<?php

namespace Tests\Feature;

<<<<<<< HEAD
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Contracts\Auth\Authenticatable;
use Tests\TestCase;
=======
>>>>>>> 2c7c640da83d507ce21f744c9f644e20fbdc1a4b
use App\Models\Paciente;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PacienteTest extends TestCase
{

    use DatabaseMigrations;

    public function test_Abre_pagina_lista_paciente(): void
    {
        $response = $this->get('/listapacientes');

        $response->assertStatus(200);
    }

    public function test_Insercao_de_paciente(): void
    {
        $paciente = Paciente::factory()->create();

<<<<<<< HEAD
        $this->actingAs($paciente);
=======
        $paciente->actingAs($paciente, 'backend');
>>>>>>> 2c7c640da83d507ce21f744c9f644e20fbdc1a4b

        $response = $this->get('/cadastropaci');

        $response->assertStatus(200);

        $response = $this->post('/cadastropaci', [
            'nome' => 'Testeeee',
            'datanascimento' => '01122023',
            'cep' => '12345678',
            'endereco' => 'Aquela rua lá',
            'numcartaocred' => '1234123412341234',
            'hobbies' => 'Toca bateria',
            'doencascronicas' => 'Alzheimer',
            'remediosregulares' => 'Zolpidem'
        ]);

        $response->assertRedirect('/listapacientes');

        $this->assertDatabaseHas('/Pacientes', [
            'nome'=>'Testeeee',
            'datanascimento'=>'01122023',
            'cep'=>'12345678',
            'endereco'=>'Aquela rua lá',
            'numcartaocred'=>'1234123412341234',
            'hobbies'=>'Toca bateria',
            'doencascronicas'=>'Alzheimer',
            'remediosregulares'=>'Zolpidem'
        ]);

    }
}
