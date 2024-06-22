<?php

use App\Models\Agendamento;
use App\Models\AtuaArea;
use App\Models\Consulta;
use App\Models\Especializacao;
use App\Models\Paciente;
use App\Models\Profissional;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('Testa se os Agendamentos estão sendo listados', function () {

    AtuaArea::factory()->create();
    Especializacao::factory()->create();
    Profissional::factory()->create();
    Paciente::factory()->create();
    Consulta::factory()->create();

    Agendamento::factory()->count(3)->create();

    $count = Agendamento::all()->count();

    expect($count)->toBe(3);
});

test('Testa se o usuario esta sendo redirecionado para a pagina', function () {
    $response = $this->get(route('agendamentos-show'));

    $response->assertStatus(200);
});

test('Testa se o que foi criado é do tipo certo', function(){

    AtuaArea::factory()->create();
    Especializacao::factory()->create();
    Profissional::factory()->create();
    Paciente::factory()->create();
    Consulta::factory()->create();

    $response = Agendamento::factory()->count(1)->create();

    $item = $response->first();
    
    
    expect($item->id)->toBeInt();
    expect($item->especializacao_id)->toBeInt();
    expect($item->profissional_id)->toBeInt();
    expect($item->paciente_id)->toBeInt();
    expect($item->data_agendamento)->toBeString();
    expect($item->consulta_id)->toBeInt();
});

test('Testa se ao apagar o primeiro registro, ele some.', function () {

    AtuaArea::factory()->create();
    Especializacao::factory()->create();
    Profissional::factory()->create();
    Paciente::factory()->create();
    Consulta::factory()->create();

    Agendamento::factory()->count(3)->create();

    $item = Agendamento::first();
    $item->delete();

    expect($item['id'])->not->toBe('1');
});