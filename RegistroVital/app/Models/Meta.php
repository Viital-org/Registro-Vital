<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;

    protected $fillable = [
        'meta',
        'descricao',
        'data_inicio',
        'data_fim',
        'status',
    ];

    public function pacientes()
    {
        return $this->hasMany(Paciente::class, 'meta_id');
    }
}

