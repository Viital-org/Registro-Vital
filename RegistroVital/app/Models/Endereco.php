<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'enderecos';

    protected $fillable = [
        'usuario_id',
        'situacao_endereco',
        'cep',
        'rua',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'numero_endereco',
    ];

    public function usuario()
    {
        return $this->hasMany(Usuario::class,'id_usuario');
    }
}






