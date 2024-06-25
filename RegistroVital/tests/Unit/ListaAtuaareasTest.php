<?php

use App\Models\AtuaArea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('Testa se as áreas estão sendo listados', function () {

    AtuaArea::factory()->count(3)->create();

    $count = AtuaArea::all()->count();

    expect($count)->toBe(3);
});

test('Testa se o usuario esta sendo redirecionado para a pagina', function () {
    $response = $this->get(route('atuareas-show'));

    $response->assertStatus(200);
});

test('Testa se o que foi criado é do tipo certo', function(){

    $response = AtuaArea::factory()->count(1)->create();

    $item = $response->first();
    
    
    expect($item->id)->toBeInt();
    expect($item->area)->toBeString();
    expect($item->descricao)->toBeString();

});

test('Testa se ao apagar o primeiro registro, ele some.', function () {

    AtuaArea::factory()->count(3)->create();

    $item = AtuaArea::first();
    $item->delete();

    expect($item['id'])->not->toBe('1');
});