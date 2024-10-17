<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tipos_log';

    protected $fillable = [
        'descricao',
    ];
}
