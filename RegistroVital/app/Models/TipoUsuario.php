<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoUsuario extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tipos_usuarios'; // Nome da tabela

    protected $fillable = [
        'descricao', // Atributo que pode ser preenchido
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'tipo_usuario');
    }
}
