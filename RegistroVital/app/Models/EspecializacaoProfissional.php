<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspecializacaoProfissional extends Model
{
    use HasFactory;

    protected $table = 'especializacoes_profissionais';

    protected $fillable = [
        'profissional_id',
        'area_atuacao_id',
        'especializacao_id',
        'endereco_atuacao_id',
        'valor_atendimento',
        'rqe',
    ];

    // Relacionamento com Especializacao

    public static function getAreaAtuacao()
    {
        return AtuaArea::all();
    }

    // Relacionamento com Area de Atuacao

    public static function getValorAtendimento($profissional, $especializacao)
    {
        return self::where('profissional_id', $profissional)
            ->where('especializacao_id', $especializacao)
            ->value('valor_atendimento');
    }

    // Relacionamento com Endereco de Atuacao

    public static function cadastraEndereco($user, $validated, $request)
    {
        $endereco = Endereco::create([
            'usuario_id' => $user->id,
            'situacao_endereco' => 1,
            'cep' => $validated['cep'],
            'rua' => $validated['rua'],
            'complemento' => $request['complemento'],
            'bairro' => $validated['bairro'],
            'cidade' => $validated['cidade'],
            'uf' => $validated['uf'],
            'numero_endereco' => $validated['numero'],
        ]);

        $especializacao = self::create([
            'profissional_id' => $user->id,
            'area_atuacao_id' => $validated['area_atuacao_id'],
            'especializacao_id' => $validated['especializacao_id'],
            'valor_atendimento' => $validated['valor_consulta'],
            'endereco_atuacao_id' => $endereco['id'],
            'rqe' => $validated['rqe'],
        ]);
    }

    // Relacionamento com Profissional

    public function especializacoes()
    {
        return $this->belongsTo(Especializacao::class, 'especializacao_id');
    }

    public function areas_atuacao()
    {
        return $this->belongsTo(AtuaArea::class, 'area_atuacao_id');
    }

    // Métodos auxiliares

    public function enderecos()
    {
        return $this->belongsTo(Endereco::class, 'endereco_atuacao_id');
    }

    public function profissionais()
    {
        return $this->belongsTo(Profissional::class, 'profissional_id');
    }

    public function horariosAtendimento()
    {
        return $this->hasMany(HorarioAtendimento::class, 'especializacao_profissional_id');
    }
}
