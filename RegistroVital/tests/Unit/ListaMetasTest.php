<?php

use App\Models\Meta;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('Testa se as metas estão sendo listados', function () {

    Meta::factory()->count(3)->create();

    $count = Meta::all()->count();

    expect($count)->toBe(3);
});

test('Testa se o usuario esta sendo redirecionado para a pagina', function () {
    $response = $this->get(route('metas-show'));

    $response->assertStatus(200);
});

test('Testa se o que foi criado é do tipo certo', function(){

    $response = Meta::factory()->count(1)->create();

    $item = $response->first();
    
    
    expect($item->id)->toBeInt();
    expect($item->meta)->toBeString(70);
    expect($item->data_inicio)->toBeString();
    expect($item->data_fim)->toBeString();
    expect($item->descricao)->toBeString();

});

test('Testa se ao apagar o primeiro registro, ele some.', function () {

    Meta::factory()->count(3)->create();

    $item = Meta::first();
    $item->delete();

    expect($item['id'])->not->toBe('1');
});