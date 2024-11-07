<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    use HasFactory;

<<<<<<< HEAD
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
=======
    protected $table = "profissionais";
    protected $primaryKey = 'usuario_id';

    protected $fillable = [
        'usuario_id',
        'cpf',
        'cnpj',
        'registro_profissional',
        'area_atuacao_id',
        'especializacao_id',
        'genero',
        'tempo_experiencia',
>>>>>>> develop
    ];

    public function atuaarea()
    {
<<<<<<< HEAD
        return $this->belongsTo(AtuaArea::class, 'areaatuacao_id');
=======
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }

    public function AtuaArea()
    {
        return $this->belongsTo(AtuaArea::class, 'area_atuacao_id', 'id');
>>>>>>> develop
    }

    public function especializacao()
    {
<<<<<<< HEAD
        return $this->belongsTo(Especializacao::class, 'especializacao_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
=======
        return $this->belongsTo(Especializacao::class, 'especializacao_id', 'id');
    }

    public function enderecos()
    {
        return $this->hasMany(Endereco::class);
>>>>>>> develop
    }
}
