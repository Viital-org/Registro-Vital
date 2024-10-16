<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoRecomendacao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tipos_recomendacao';

    protected $fillable = [
        'descricao',
        'gera_notificacao',
    ];

    protected $dates = ['deleted_at'];
}
