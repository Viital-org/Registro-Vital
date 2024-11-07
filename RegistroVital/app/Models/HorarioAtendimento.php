<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HorarioAtendimento extends Model
{
    protected $table = 'horarios_atendimento';

    protected $fillable = [
        'especializacao_profissional_id',
        'dia_semana',
        'inicio_atendimento',
        'fim_atendimento',
        'tempo_consulta',
        'inicio_pausa',
        'fim_pausa',
    ];

    // Relacionamento com EspecializacaoProfissional
    public function especializacaoProfissional()
    {
        return $this->belongsTo(EspecializacaoProfissional::class, 'especializacao_profissional_id');
    }
}
