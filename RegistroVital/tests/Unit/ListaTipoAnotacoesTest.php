<?php

use App\Models\TipoAnotacao;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('Testa se os tipos de anotacao estão sendo listados', function () {

    TipoAnotacao::factory()->count(3)->create();

    $count = TipoAnotacao::all()->count();

    expect($count)->toBe(3);
});

test('Testa se o usuario esta sendo redirecionado para a pagina', function () {
    $response = $this->get(route('tipoanotacao-show'));

    $response->assertStatus(200);
});

test('Testa se o que foi criado é do tipo certo', function () {

    $response = TipoAnotacao::factory()->count(1)->create();

    $item = $response->first();


    expect($item->id)->toBeInt();
    expect($item->tipo_anotacao)->toBeInt();
    expect($item->desc_anotacao)->toBeString();

});

test('Testa se ao apagar o primeiro registro, ele some.', function () {

    TipoAnotacao::factory()->count(3)->create();

    $item = TipoAnotacao::first();
    $item->delete();

    expect($item['id'])->not->toBe('1');
});
