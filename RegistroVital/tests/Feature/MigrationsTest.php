<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MigrationsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function criação_de_tabelas_migrations()
    {
        $this->artisan('migrate:fresh');

        $this->assertTrue(\Schema::hasTable('tipos_usuarios'));
        $this->assertTrue(\Schema::hasTable('cache'));
        $this->assertTrue(\Schema::hasTable('jobs'));
        $this->assertTrue(\Schema::hasTable('job_batches'));
        $this->assertTrue(\Schema::hasTable('failed_jobs'));
        $this->assertTrue(\Schema::hasTable('usuarios'));
        $this->assertTrue(\Schema::hasTable('password_reset_tokens'));
        $this->assertTrue(\Schema::hasTable('sessions'));
        $this->assertTrue(\Schema::hasTable('tipos_recomendacao'));
        $this->assertTrue(\Schema::hasTable('status'));
        $this->assertTrue(\Schema::hasTable('tipos_anotacao'));
        $this->assertTrue(\Schema::hasTable('tipos_documento'));
        $this->assertTrue(\Schema::hasTable('tipos_visibilidade'));
        $this->assertTrue(\Schema::hasTable('tipos_log'));
        $this->assertTrue(\Schema::hasTable('pacientes'));
        $this->assertTrue(\Schema::hasTable('profissionais'));
        $this->assertTrue(\Schema::hasTable('administradores'));
        $this->assertTrue(\Schema::hasTable('metas'));
        $this->assertTrue(\Schema::hasTable('anotacoes'));
        $this->assertTrue(\Schema::hasTable('dicas'));
        $this->assertTrue(\Schema::hasTable('logs'));
        $this->assertTrue(\Schema::hasTable('areas_atuacao'));
        $this->assertTrue(\Schema::hasTable('documentos'));
        $this->assertTrue(\Schema::hasTable('enderecos_atuacao'));
        $this->assertTrue(\Schema::hasTable('estados_civis'));
        $this->assertTrue(\Schema::hasTable('especializacoes'));
        $this->assertTrue(\Schema::hasTable('agendamentos'));
        $this->assertTrue(\Schema::hasTable('consultas'));
        $this->assertTrue(\Schema::hasTable('feedbacks'));
        $this->assertTrue(\Schema::hasTable('recomendacoes'));
        $this->assertTrue(\Schema::hasTable('agendas_profissionais'));
    }
}


