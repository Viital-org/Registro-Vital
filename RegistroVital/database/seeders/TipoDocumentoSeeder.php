<?php

namespace Database\Seeders;

use App\Models\TipoDocumento;
use Illuminate\Database\Seeder;

class TipoDocumentoSeeder extends Seeder
{
    public function run()
    {
        $documentos = [
            ['extensao_documento' => 'PDF', 'tamanho_maximo_kb' => 2048],
            ['extensao_documento' => 'PNG', 'tamanho_maximo_kb' => 1024],
            ['extensao_documento' => 'JPG', 'tamanho_maximo_kb' => 1024],
            ['extensao_documento' => 'TXT', 'tamanho_maximo_kb' => 512],
            ['extensao_documento' => 'TSV', 'tamanho_maximo_kb' => 512],
            ['extensao_documento' => 'BMP', 'tamanho_maximo_kb' => 2048],
        ];

        foreach ($documentos as $documento) {
            TipoDocumento::create($documento);
        }
    }
}
