<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    use HasFactory;
    protected $table = "profissionais";

    protected $fillable = [
        'usuario_id',
        'cpf',
        'cnpj',
        'registro_profissional',
        'area_atuacao',
        'especializacao',
        'genero',
        'tempo_experiencia',
        'data_criacao',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
