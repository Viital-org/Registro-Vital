<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anotacaosaude extends Model
{
    use HasFactory;

    protected $table = 'anotacoessaude';

    protected $fillable = [
        'paciente_id',
        'anotacao',
        'data_anotacao',
        'tipo_anot',
        'visibilidade',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}

