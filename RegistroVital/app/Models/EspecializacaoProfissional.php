<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspecializacaoProfissional extends Model
{
    use HasFactory;

    protected $table = 'especializacoes_profissionais';

    protected $fillable = [
        'area_atuacao_id',
        'especializacao_id',
        'endereco_atuacao_id',
        'valor_atendimento'
    ];
}
