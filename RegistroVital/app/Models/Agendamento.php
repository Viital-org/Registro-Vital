<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $table = 'agendamentos';

    protected $fillable = [
        'area_atuacao_id',
        'especializacao_id',
        'profissional_id',
        'paciente_id',
        'data_agendamento',
        'consulta_id',
        'situacao_paciente',
        'situacao_profissional',
        'endereco_consulta_id',
        'valor_atendimento',
    ];

    public function consulta()
    {
        return $this->belongsTo(Consulta::class, 'consulta_id');
    }

    public function especializacoes() // PEGA A ÁREA DE ATUACAO DA ESPECIALIZACAO
    {
        return $this->hasMany(Especializacao::class, 'area_atuacao_id');
    }

    public function profissionais() //PEGA A ESPECIALIZACAO DO PROFISSIONAL
    {
        return $this->hasMany(Profissional::class, 'especializacao_id');
    }

    public function profissional() // PEGA O PROFISSIONAL
    {
        return $this->belongsTo(Profissional::class, 'profissional_id');
    }

    public function especializacao()
    {
        return $this->belongsTo(Especializacao::class,'especializacao_id');
    }

    /*public function areaAtuacaoEspecializacoes()
    {
        return $this->hasMany(Especializacao::class, 'area_atuacao_id');
    }

    public function EspecializacoesProfissionais()
    {
        return $this->hasMany(Profissional::class, 'especializacao_id');
    }*/

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'endereco_consulta_id');
    }
}

