<?php

use App\Models\AtuaArea;
use App\Models\Especializacao;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('Testa se as especializações estão sendo listados', function () {

    AtuaArea::factory()->create();

    Especializacao::factory()->count(3)->create();

    $count = Especializacao::all()->count();

    expect($count)->toBe(3);
});

test('Testa se o usuario esta sendo redirecionado para a pagina', function () {
    $response = $this->get(route('especializacoes-show'));

    $response->assertStatus(200);
});

test('Testa se o que foi criado é do tipo certo', function () {

    AtuaArea::factory()->create();

    $response = Especializacao::factory()->count(1)->create();

    $item = $response->first();


    expect($item->id)->toBeInt();
    expect($item->especializacao)->toBeString();
    expect($item->tempoespecializacao)->toBeInt();
    expect($item->area_id)->toBeInt();
    expect($item->descricao)->toBeString();

});

test('Testa se ao apagar o primeiro registro, ele some.', function () {

    AtuaArea::factory()->create();

    Especializacao::factory()->count(3)->create();

    $item = Especializacao::first();
    $item->delete();

    expect($item['id'])->not->toBe('1');
});
