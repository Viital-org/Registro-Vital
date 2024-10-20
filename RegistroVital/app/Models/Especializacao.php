<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Especializacao extends Model
{
    use HasFactory, SoftDeletes;

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
    public function profissionais()
    {
        return $this->hasMany(Profissional::class, 'especializacao', 'id');
    }
}

