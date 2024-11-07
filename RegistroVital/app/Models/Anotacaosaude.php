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
<<<<<<< HEAD
        'tipo_anot',
        'visibilidade',
=======
        'tipo_anotacao',
        'tipo_visibilidade',
>>>>>>> develop
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }
}

