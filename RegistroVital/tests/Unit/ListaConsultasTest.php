<?php

use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Profissional;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('Testa se as consultas estão sendo listados', function () {

    Profissional::factory()->create();
    Paciente::factory()->create();

    Consulta::factory()->count(3)->create();

    $count = Consulta::all()->count();

    expect($count)->toBe(3);
});

test('Testa se o usuario esta sendo redirecionado para a pagina', function () {
    $response = $this->get(route('consultas-show'));

    $response->assertStatus(200);
});

test('Testa se o que foi criado é do tipo certo', function () {

    Profissional::factory()->create();
    Paciente::factory()->create();

    $response = Consulta::factory()->count(1)->create();

    $item = $response->first();


    expect($item->id)->toBeInt();
    expect($item->data)->toBeString();
    expect($item->status)->toBeString();
    expect($item->valor)->toBeFloat();
    expect($item->profissional_id)->toBeInt();
    expect($item->paciente_id)->toBeInt();

});

test('Testa se ao apagar o primeiro registro, ele some.', function () {

    Profissional::factory()->create();
    Paciente::factory()->create();

    Consulta::factory()->count(3)->create();

    $item = Consulta::first();
    $item->delete();

    expect($item['id'])->not->toBe('1');
});
