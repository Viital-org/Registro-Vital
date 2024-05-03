<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especializacao extends Model
{
    use HasFactory;

    protected $table = 'especializacoes';

    protected $fillable = [
        'especializacao',
        'tempoespecializacao',
        'descricao',
        'area_id',
    ];

    public function area()
    {
        return $this->belongsTo(AtuaArea::class, 'area_id');
    }
}

