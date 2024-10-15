<?php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MigrationsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function criação_de_tabelas_migrations()
    {
        $this->artisan('migrate');

        $this->assertTrue(\Schema::hasTable('usuarios'));
        $this->assertTrue(\Schema::hasTable('cache'));
        $this->assertTrue(\Schema::hasTable('jobs'));
        $this->assertTrue(\Schema::hasTable('tipos_usuarios'));
        $this->assertTrue(\Schema::hasTable('tipos_usuarios'));
        $this->assertTrue(\Schema::hasTable('pacientes'));
        $this->assertTrue(\Schema::hasTable('profissionais'));
    }
}


