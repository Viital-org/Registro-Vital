<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetViewTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    /** PROFISSIONAIS */
    public function test_Renderiza_tela_de_listagem_de_profissionais(): void
    {
        $response = $this->get('/listaprofissionais');

        $response->assertStatus(200);
    }

    public function test_Renderiza_tela_de_cadastro_de_profissionais(): void
    {
        $response = $this->get('/cadastroprofissional');

        $response->assertStatus(200);
    }

    // Popular banco, para depois buscar um ID, para ser enviado como get
    // public function test_Renderiza_tela_de_edicao_de_profissionais(): void
    // {
    //     $response = $this->get('/editarprofissional/{id}');

    //     $response->assertStatus(200);
    // }

    // // Popular banco, para depois buscar um ID, para ser enviado como get
    // public function test_Renderiza_tela_de_exclusao_de_profissionais(): void
    // {
    //     $response = $this->get('/listaprofissionais/{id}');

    //     $response->assertStatus(200);
    // }




    /** PACIENTES */ 
    public function test_Renderiza_tela_de_cadastro_de_pacientes(): void
    {
        $response = $this->get('/cadastropaci');

        $response->assertStatus(200);
    }

    public function test_Renderiza_tela_de_listagem_de_pacientes(): void
    {
        $response = $this->get('/listapacientes');

        $response->assertStatus(200);
    }

    // // Popular banco, para depois buscar um ID, para ser enviado como get
    // public function test_Renderiza_tela_de_edicao_de_pacientes(): void
    // {
    //     $response = $this->get('/editarpaciente/{id}');

    //     $response->assertStatus(200);
    // }

    // // Popular banco, para depois buscar um ID, para ser enviado como get
    // public function test_Renderiza_tela_de_exclusao_de_pacientes(): void
    // {
    //     $response = $this->get('/listapacientes/{id}');

    //     $response->assertStatus(200);
    // }




    /** CONSULTAS */ 
    public function test_Renderiza_tela_de_cadastro_de_consultas(): void
    {
        $response = $this->get('/cadastroconsultas');

        $response->assertStatus(200);
    }

    public function test_Renderiza_tela_de_listagem_de_consultas(): void
    {
        $response = $this->get('/listaconsultas');

        $response->assertStatus(200);
    }

    // Popular banco, para depois buscar um ID, para ser enviado como get
    // public function test_Renderiza_tela_de_edicao_de_consultas(): void
    // {
    //     $response = $this->get('/editarconsulta/{id}');

    //     $response->assertStatus(200);
    // }

    // Popular banco, para depois buscar um ID, para ser enviado como get
    // public function test_Renderiza_tela_de_exclusao_de_conssultas(): void
    // {
    //     $response = $this->get('/listaconsultas/{id}');

    //     $response->assertStatus(200);
    // }




    /** ÁREAS DE ATUAÇÃO */
    public function test_Renderiza_tela_de_cadastro_de_areas_de_atuacao(): void
    {
        $response = $this->get('/cadastroatuaareas');

        $response->assertStatus(200);
    }

    public function test_Renderiza_tela_de_listagem_de_areas_de_atuacao(): void
    {
        $response = $this->get('/listaatuaareas');

        $response->assertStatus(200);
    }

    // Popular banco, para depois buscar um ID, para ser enviado como get
    // public function test_Renderiza_tela_de_edicao_de_areas_de_atuacao(): void
    // {
    //     $response = $this->get('/editaratuaarea/{id}');

    //     $response->assertStatus(200);
    // }

    // Popular banco, para depois buscar um ID, para ser enviado como get
    // public function test_Renderiza_tela_de_exclusao_de_areas_de_atuacao(): void
    // {
    //     $response = $this->get('/listaatuaareas/{id}');

    //     $response->assertStatus(200);
    // }




    /** ESPECIALIZAÇÕES */
    public function test_Renderiza_tela_de_cadastro_de_especializacoes(): void
    {
        $response = $this->get('/cadastroespecializacoes');

        $response->assertStatus(200);
    }

    public function test_Renderiza_tela_de_listagem_de_especializacoes(): void
    {
        $response = $this->get('/listaespecializacoes');

        $response->assertStatus(200);
    }

    // Popular banco, para depois buscar um ID, para ser enviado como get
    // public function test_Renderiza_tela_de_edicao_de_especializacoes(): void
    // {
    //     $response = $this->get('/editarespecializacao/{id}');

    //     $response->assertStatus(200);
    // }

    // // Popular banco, para depois buscar um ID, para ser enviado como get
    // public function test_Renderiza_tela_de_exclusao_de_especializacoes(): void
    // {
    //     $response = $this->get('/listaespecializacoes/{id}');

    //     $response->assertStatus(200);
    // }

}