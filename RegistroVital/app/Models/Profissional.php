<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    use HasFactory;

    protected $table = "profissionais";
    protected $primaryKey = 'usuario_id';

    protected $fillable = [
        'usuario_id',
        'cpf',
        'cnpj',
        'registro_profissional',
        'area_atuacao_id',
        'especializacao_id',
        'genero',
        'tempo_experiencia',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }

    public function AtuaArea()
    {
        return $this->belongsTo(AtuaArea::class, 'area_atuacao_id', 'id');
    }

    public function especializacao()
    {
        return $this->belongsTo(Especializacao::class, 'especializacao_id', 'id');
    }
}
