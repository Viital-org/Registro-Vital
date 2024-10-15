<?php

use app\Models\Meta;
use App\Models\Paciente;
use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('Testa se os pacientes estão sendo listados', function () {

    Usuario::factory()->create();

    Paciente::factory()->count(3)->create();

    $count = Paciente::all()->count();

    expect($count)->toBe(3);
});

test('Testa se o usuario esta sendo redirecionado para a pagina', function () {
    $response = $this->get(route('pacientes-show'));

    $response->assertStatus(200);
});

test('Testa se o que foi criado é do tipo certo', function () {

    Usuario::factory()->create();

    Meta::factory()->create();

    $response = Paciente::factory()->count(1)->create();

    $item = $response->first();


    expect($item->id)->toBeInt();
    expect($item->nome)->toBeString();
    expect($item->datanascimento)->toBeString();
    expect($item->cep)->toBeString();
    expect($item->endereco)->toBeString();
    expect($item->numcartaocred)->toBeString();
    expect($item->hobbies)->toBeString();
    expect($item->doencascronicas)->toBeString();
    expect($item->remediosregulares)->toBeString();
    expect($item->meta_id)->toBeInt();

});

test('Testa se ao apagar o primeiro registro, ele some.', function () {

    Usuario::factory()->create();

    Paciente::factory()->count(3)->create();

    $item = Paciente::first();
    $item->delete();

    expect($item['id'])->not->toBe('1');
});
