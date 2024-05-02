<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Paciente;

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

        $paciente->actingAs($paciente);

        $response = $this->get('/cadastropaci');

        $response->assertSatatus(200);

        $response = $this->post('/cadastropaci', [
            'nome'=>'Testeeee',
            'datanascimento'=>'01122023',
            'cep'=>'12345678',
            'endereco'=>'Aquela rua lá',
            'numcartaocred'=>'1234123412341234',
            'hobbies'=>'Toca bateria',
            'doencascronicas'=>'Alzheimer',
            'remediosregulares'=>'Zolpidem'
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('/Pacientes', [
            'nome' => $this->faker->name,
            'datanascimento' => $this->faker->date,
            'cep' => $this->faker->postcode(),
            'endereco' => $this->faker->address,
            'numcartaocred' => $this->faker->creditCardNumber(),
            'hobbies' => $this->faker->text,
            'doencascronicas' => $this->faker->word,
            'remediosregulares' => $this->faker->word,
        ]);

    }
}
