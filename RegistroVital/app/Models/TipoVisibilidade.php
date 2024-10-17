<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoVisibilidade extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tipos_visibilidade';

    protected $fillable = [
        'descricao',
    ];

    protected $dates = ['deleted_at'];
}
