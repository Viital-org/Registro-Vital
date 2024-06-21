<?php
use App\Models\Profissional;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('Testa se os profissionais estão sendo listados', function () {

    Profissional::factory()->count(3)->create();

    $count = Profissional::all()->count();

    expect($count)->toBe(3);
});

test('Testa se o usuario esta sendo redirecionado para a pagina', function () {
    $response = $this->get(route('profissionais-show'));

    $response->assertStatus(200);
});

test('Testa se o o que foi criado é do tipo certo', function(){

    $response = Profissional::factory()->count(1)->create();

    $item = $response->first();
    
    
    expect($item->id)->toBeInt();
    expect($item->nome)->toBeString();
    expect($item->email)->toBeString();
    expect($item->enderecoatuacao)->toBeString();
    expect($item->localformacao)->toBeString();
    expect($item->dataformacao)->toBeString();

});

test('Testa se ao apagar o primeiro registro, ele some.', function () {

    Profissional::factory()->count(3)->create();

    $item = Profissional::first();
    $item->delete();

    expect($item['id'])->not->toBe('1');
});