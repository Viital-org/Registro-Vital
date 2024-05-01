<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dica extends Model
{
    use HasFactory;

    protected $fillable = [
        'dica',
        'paciente_id',
        'descricao',
    ];
}
