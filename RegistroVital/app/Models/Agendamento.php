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
        'hora_agendamento',
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

    public function especializacoes()
    {
        return $this->hasMany(Especializacao::class, 'area_atuacao_id');
    }

    public function profissionais()
    {
        return $this->belongsToMany(Profissional::class, 'especializacao_profissionais', 'agendamento_id', 'profissional_id');
    }

    public function profissional()
    {
        return $this->belongsTo(Profissional::class, 'profissional_id');
    }

    public function especializacao()
    {
        return $this->belongsTo(Especializacao::class, 'especializacao_id');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'endereco_consulta_id');
    }
}

