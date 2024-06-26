<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    use HasFactory;

    protected $table = 'profissionais';

    protected $fillable = [
        'user_id',
        'areaatuacao_id',
        'especializacao_id',
        'nome',
        'email',
        'enderecoatuacao',
        'localformacao',
        'dataformacao',
        'descricaoperfil',
    ];

    public function atuaarea()
    {
        return $this->belongsTo(AtuaArea::class, 'areaatuacao_id');
    }

    public function especializacao()
    {
        return $this->belongsTo(Especializacao::class, 'especializacao_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
