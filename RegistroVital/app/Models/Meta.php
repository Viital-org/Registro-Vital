<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meta extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'paciente_id',
        'titulo_meta',
        'descricao_meta',
        'data_inicio',
        'data_fim',
        'situacao',
        'notificacao_diaria',
    ];

    public function paciente(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }
}

