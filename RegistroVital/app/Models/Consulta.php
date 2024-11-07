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
}

