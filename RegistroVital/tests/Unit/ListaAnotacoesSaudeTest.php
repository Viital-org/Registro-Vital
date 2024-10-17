<?php

use App\Models\Anotacaosaude;
use App\Models\Paciente;
use App\Models\TipoAnotacao;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('Testa se as anotacoes estão sendo listados', function () {

    Paciente::factory()->create();
    TipoAnotacao::factory()->create();

    Anotacaosaude::factory()->count(3)->create();

    $count = Anotacaosaude::all()->count();

    expect($count)->toBe(3);
});

test('Testa se o usuario esta sendo redirecionado para a pagina', function () {

    $response = $this->post(route('anotacoessaude-index'));

    $response->assertStatus(200);
});

test('Testa se o que foi criado é do tipo certo', function () {

    Paciente::factory()->create();
    TipoAnotacao::factory()->create();

    $response = Anotacaosaude::factory()->count(1)->create();

    $item = $response->first();


    expect($item->id)->toBeInt();
    expect($item->paciente_id)->toBeInt();
    expect($item->tipo_anotacao)->toBeInt();
    expect($item->descricao_anotacao)->toBeString();
    expect($item->tipo_visibilidade)->toBeBool();
    expect($item->possui_documento)->toBeBool();

});

test('Testa se ao apagar o primeiro registro, ele some.', function () {

    Paciente::factory()->create();
    TipoAnotacao::factory()->create();

    Anotacaosaude::factory()->count(3)->create();

    $item = Anotacaosaude::first();
    $item->delete();

    expect($item['id'])->not->toBe('1');
});
