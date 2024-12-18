<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
<<<<<<< HEAD
        'data',
        'status',
        'profissional_id',
        'paciente_id',
        'valor',
=======
        'profissional_id',
        'paciente_id',
        'agendamento_id',
        'situacao',
<<<<<<< HEAD
>>>>>>> develop
=======
        'motivo',
        'horario_inicio_real',
        'horario_fim_real'
>>>>>>> develop
    ];

    public function profissional()
    {
        return $this->belongsTo(Profissional::class, 'profissional_id');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function agendamento()
    {
        return $this->belongsTo(Agendamento::class, 'agendamento_id');
    }
}

