<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

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


    public function especializacoes()
    {
        return $this->belongsTo(Especializacao::class, 'especializacao_id');
    }

    public function areas_atuacao()
    {
        return $this->belongsTo(AtuaArea::class, 'area_atuacao_id');
    }

    public function enderecos()
    {
        return $this->belongsTo(Endereco::class, 'endereco_atuacao_id');
    }

    public static function getAreaAtuacao() {

        $AreaAtuacao = AtuaArea::all();

        return $AreaAtuacao;

    }

    public static function cadastraEndereco($user, $validated, $request){
        $endereco = Endereco::create([
            'usuario_id'=> $user->id,
            'situacao_endereco'=> 1,
            'cep'=> $validated['cep'],
            'rua'=> $validated['rua'],
            'complemento'=>$request['complemento'],
            'bairro'=> $validated['bairro'],
            'cidade'=>$validated['cidade'],
            'uf'=>$validated['uf'],
            'numero_endereco'=>$validated['numero'],
        ]);
        $especializacao = EspecializacaoProfissional::create([
            'profissional_id'=> $user->id,
            'area_atuacao_id'=> $validated['area_atuacao_id'],
            'especializacao_id'=> $validated['especializacao_id'],
            'valor_atendimento'=>$validated['valor_consulta'],
            'endereco_atuacao_id'=>$endereco['id'],
            'rqe'=>$validated['rqe'],

        ]);
    }

}
