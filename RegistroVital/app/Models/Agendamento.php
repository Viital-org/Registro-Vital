<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'especialidade',
        'idprofissional',
        'idpaciente',
        'data',
        'consulta',
    ];

    public function consulta(){
        return $this->belongsTo(Consulta::class);
    }
}
