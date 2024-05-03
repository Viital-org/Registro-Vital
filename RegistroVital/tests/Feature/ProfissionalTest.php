<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfissionalTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Abre_pagina_lista_profissionais(): void
    {
        $response = $this->get('/listaprofissionais');

        $response->assertStatus(200);
    }
}
