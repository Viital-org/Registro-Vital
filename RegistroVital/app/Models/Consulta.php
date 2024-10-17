<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'consultas';

    protected $fillable = [
        'paciente_id',
        'profissional_id',
        'agendamento_id',
        'area_atuacao_id',
        'especializacao_id',
        'situacao',
        'data',
        'valor',
        'endereco_consulta',
    ];

    public function profissional()
    {
        return $this->belongsTo(Profissional::class, 'profissional_id');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }
}

