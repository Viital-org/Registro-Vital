<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'titulo_meta',
        'descricao_meta',
        'tipo_meta_id',
        'data_inicio',
        'data_fim',
        'unidade_metrica',
        'quantidade_alvo',
        'progresso_atual',
        'indefinida',
        'situacao',
        'data_ultimo_reset',
        'sequencia_atual',
        'maior_sequencia',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id', 'usuario_id');
    }

    public function tipoMeta()
    {
        return $this->belongsTo(TipoMeta::class, 'tipo_meta_id');
    }

    public function calcularProgresso()
    {
        return min(100, round(($this->progresso_atual / $this->quantidade_alvo) * 100, 2));
    }

    public function calcularTempoRestante()
    {
        if ($this->indefinida) {
            return "Indefinida";
        }

        if (!$this->data_fim) {
            return "Data de fim não definida";
        }

        $diasRestantes = now()->diffInDays($this->data_fim);
        $diasRestantesFormatado = number_format($diasRestantes, 1);

        if ($diasRestantes > 0) {
            return "{$diasRestantesFormatado} dias restantes";
        }

        $this->situacao = 2;
        $this->save();
        return "Meta concluída ou prazo expirado";
    }

    public function incrementarSequencia()
    {
        $this->sequencia_atual++;

        if ($this->sequencia_atual > $this->maior_sequencia) {
            $this->maior_sequencia = $this->sequencia_atual;
        }
    }
}
