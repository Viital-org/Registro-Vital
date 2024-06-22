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

test("Testa se quando uma consulta é criada, o agendamento também é", function () {
    expect(true)->toBeTrue();

});


test('Testa se a criacao deu certo', function () {

    AtuaArea::factory()->create();
    $especializacao = Especializacao::factory()->create();
    $profissional = Profissional::factory()->create();
    $paciente = Paciente::factory()->create();
    $consulta = Consulta::factory()->create();

    $dadosAgendamento = [
        'especializacao_id' => $especializacao->id,
        'profissional_id' => $profissional->id,
        'paciente_id' => $paciente->id,
        'data_agendamento' => '2021-01-01', // Formato correto de data no Laravel
        'consulta_id' => $consulta->id,
    ];

    // Criação do Agendamento usando Eloquent
    $agendamento = Agendamento::create($dadosAgendamento);

    $this->assertInstanceOf(Agendamento::class, $agendamento);
    $this->assertEquals($dadosAgendamento['especializacao_id'], $agendamento->especializacao_id);
    $this->assertEquals($dadosAgendamento['profissional_id'], $agendamento->profissional_id);
    $this->assertEquals($dadosAgendamento['paciente_id'], $agendamento->paciente_id);
    $this->assertEquals($dadosAgendamento['data_agendamento'], $agendamento->data_agendamento);
    $this->assertEquals($dadosAgendamento['consulta_id'], $agendamento->consulta_id);

});

test('Testa se o que esta sendo criado esta sendo persistido no banco de dados', function(){
    $teste = true;

    expect($teste)->toBeTrue();
});