<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class TesteFraseInspiradora extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:teste';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exibe uma frase inspiradora como um teste';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->comment('Aqui está uma frase inspiradora: ' . Inspiring::quote());
    }
}
