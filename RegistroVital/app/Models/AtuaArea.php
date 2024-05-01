<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class   AtuaArea extends Model
{
    use HasFactory;

    protected $table = 'Atuaareas';
    protected $fillable = [
        'area',
        'descricao',
    ];

    public function especializacoes()
    {
        return $this->hasMany(Especializacao::class, 'area_id');
    }

}

