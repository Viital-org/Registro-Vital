<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AtuaArea extends Model
{
    use hasfactory, softDeletes;

    protected $table = 'atuaareas';

    protected $fillable = [
        'area',
        'descricao'
    ];

    public function especializacoes()
    {
        return $this->hasMany(Especializacao::class, 'area_id');
    }

    protected static function booted()
    {
        static::deleting(function ($atuaarea) {
            $atuaarea->especializacoes()->delete();
        });
    }
}
