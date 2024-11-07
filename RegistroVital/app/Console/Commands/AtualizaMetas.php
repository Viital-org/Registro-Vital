<?php

namespace App\Console\Commands;

use App\Models\Meta;
use Illuminate\Console\Command;

class AtualizaMetas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:atualizar-metas-diariamente';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Atualiza o progresso das metas diariamente e reseta o progresso se necessário';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $metas = Meta::all();

        foreach ($metas as $meta) {
            if ($meta->progresso_atual >= $meta->quantidade_alvo) {
                $meta->incrementarSequencia();
            } else {
                $meta->sequencia_atual = 0;
                $meta->data_ultimo_reset = now();
            }
            $meta->progresso_atual = 0;
            $meta->save();
        }

        $this->info('Metas atualizadas com sucesso.');
    }
}
