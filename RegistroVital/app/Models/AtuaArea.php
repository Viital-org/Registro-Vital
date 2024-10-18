<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AtuaArea extends Model
{
    use hasfactory, softDeletes;

    protected $table = 'areas_atuacao';

    protected $fillable = [
        'area',
        'descricao'
    ];

    protected static function booted()
    {
        static::deleting(function ($atuaarea) {
            $atuaarea->especializacoes()->delete();
        });
    }

    public function especializacoes()
    {
        return $this->hasMany(Especializacao::class, 'area_id');
    }
}
