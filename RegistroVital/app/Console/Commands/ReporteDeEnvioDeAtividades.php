<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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

        $logFilePath = storage_path('logs/auth.log');

        if (!file_exists($logFilePath)) {
            $this->error('Arquivo de log não encontrado.');
            return;
        }


        $logLines = file($logFilePath);

        $relatorio = "Relatório de atividades dos últimos 30 dias:\n\n";
        $dataLimite = now()->subDays(30);

        foreach ($logLines as $linha) {
            if ($this->isLinhaRecente($linha, $dataLimite)) {
                $relatorio .= $linha;
            }
        }

        try {
            Mail::raw($relatorio, function ($message) {
                $message->from('no-reply@sistema.com', 'Sistema Registro Vital');
                $message->to('@gmail.com')->subject('Relatório de Atividades');
            });

            Log::info('Relatório de atividades gerado e enviado com sucesso.');
        } catch (Exception $e) {
            Log::error("Falha no envio do relatório de atividades: {$e->getMessage()}");
        }

        $this->info('Relatório de atividades foi gerado e enviado com sucesso.');
    }

    /**
     * Verifica se a linha do log é recente (dentro dos últimos 30 dias).
     *
     * @param string $linha
     * @param \Carbon\Carbon $dataLimite
     * @return bool
     */
    private function isLinhaRecente(string $linha, $dataLimite): bool
    {
        if (preg_match('/^\[([^\]]+)\]/', $linha, $matches)) {
            $dataLinha = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', trim($matches[1]));
            return $dataLinha && $dataLinha->greaterThanOrEqualTo($dataLimite);
        }

        return false;
    }
}
