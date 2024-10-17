<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'cpf',
        'rg',
        'data_nascimento',
        'rua_endereco',
        'numero_endereco',
        'cep',
        'cidade',
        'estado',
        'genero',
        'estado_civil',
        'tipo_sanguineo',
        'data_criacao',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
