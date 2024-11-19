<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AtuaArea extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'areas_atuacao';

    protected $fillable = [
        'descricao_area',
    ];

    protected static function booted()
    {
        static::deleting(function ($atuaarea) {
            $atuaarea->especializacoes()->delete();
        });
    }

    public function especializacoes()
    {
        return $this->hasMany(Especializacao::class, 'area_atuacao_id', 'id');
    }

    public function profissionais()
    {
        return $this->hasMany(Profissional::class, 'area_atuacao_id', 'id');
    }

}

