<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAnotacao extends Model
{
    use HasFactory;

    protected $table = 'tipoanotacoes';

    protected $fillable = [
        'tipo_anotacao',
        'desc_anotacao'
    ];
}
