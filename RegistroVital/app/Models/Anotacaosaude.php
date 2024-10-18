<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anotacaosaude extends Model
{
    use HasFactory;

    protected $table = 'anotacoes';

    protected $fillable = [
        'paciente_id',
        'descricao_anotacao',
        'data_anotacao',
        'tipo_anotacao',
        'tipo_visibilidade',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }
}

