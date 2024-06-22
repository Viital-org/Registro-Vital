<?php

use App\Models\Dica;
use App\Models\Paciente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('Testa se as dicas estão sendo listados', function () {

    Paciente::factory()->create();

    Dica::factory()->count(3)->create();

    $count = Dica::all()->count();

    expect($count)->toBe(3);
});

test('Testa se o usuario esta sendo redirecionado para a pagina', function () {
    $response = $this->get(route('dicas-show'));

    $response->assertStatus(200);
});

test('Testa se o que foi criado é do tipo certo', function(){

    Paciente::factory()->create();

    $response = Dica::factory()->count(1)->create();

    $item = $response->first();
    
    
    expect($item->id)->toBeInt();
    expect($item->dica)->toBeString();
    expect($item->paciente_id)->toBeInt();
    expect($item->descricao)->toBeString();

});

test('Testa se ao apagar o primeiro registro, ele some.', function () {

    Paciente::factory()->create();

    Dica::factory()->count(3)->create();

    $item = Dica::first();
    $item->delete();

    expect($item['id'])->not->toBe('1');
});