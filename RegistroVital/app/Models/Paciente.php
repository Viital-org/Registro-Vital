<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'datanascimento',
        'cep',
        'endereco',
        'numcartaocred',
        'hobbies',
        'doencascronicas',
        'remediosregulares',
        'meta_id',
    ];

    public function meta()
    {
        return $this->belongsTo(Meta::class, 'meta_id');
    }
}
