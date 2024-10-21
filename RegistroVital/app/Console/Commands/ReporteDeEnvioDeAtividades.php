<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Exception;

class ReporteDeEnvioDeAtividades extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reporte-de-envio-de-atividades';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia um relatório sobre as atividades do sistema';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        ini_set('memory_limit', '1024M');

        $relatorio = "Relatório de atividades dos últimos 7 dias:\n\n";

        /* temos que configurar a tabela de logs depois
         * DB::table('logs')
            ->where('created_at', '>=', now()->subDays(7))
            ->orderBy('created_at', 'asc')
            ->chunk(100, function ($atividades) use (&$relatorio) {
                foreach ($atividades as $atividade) {
                    $relatorio .= "Usuário ID: {$atividade->user_id}, Ação: {$atividade->action}, Data: {$atividade->created_at}\n";
                }
            });
        */

        try {
            Mail::raw($relatorio, function ($message) {
                $message->from('no-reply@sistema.com', 'Sistema Registro Vital');
                $message->to('')->subject('Relatório de Atividades');
            });

            Log::info('Relatório de atividades gerado e enviado com sucesso.');
        } catch (Exception $e) {
            Log::error("Falha no envio do relatório de atividades: {$e->getMessage()}");
        }

        $this->info('Relatório de atividades foi gerado e enviado com sucesso.');
    }
}
