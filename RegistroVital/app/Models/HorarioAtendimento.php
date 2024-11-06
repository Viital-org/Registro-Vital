<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HorarioAtendimento extends Model
{
    protected $table = 'horarios_atendimento';

    protected $fillable = [
        'profissional_id',
        'especializacao_id',
        'dia_semana',
        'inicio_atendimento',
        'fim_atendimento',
        'tempo_consulta',
        'inicio_pausa',
        'fim_pausa',
    ];

}
