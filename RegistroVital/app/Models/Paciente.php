<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\PacienteInterface;
use Illuminate\Foundation\Auth\Paciente as Authenticatable;

class Paciente extends Model implements PacienteInterface
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'datanascimento',
        'cep',
        'endereco',
        'numcartaocred',
        'hobbies',
        'doencascronicas',
        'remediosregulares',
        'meta_id',
    ];

<<<<<<< HEAD
    public function getNome(): string
    {
        return $this->nome;
    }

    public function getDataNascimento(): string
    {
        return $this->datanascimento;
    }

    public function getCep(): string
    {
        return $this->cep;
    }

    public function getEndereco(): string
    {
        return $this->endereco;
    }

    public function getNumeroCartaoCredito(): string
    {
        return $this->numcartaocred;
    }

    public function getHobbies(): string
    {
        return $this->hobbies;
    }

    public function getDoencasCronicas(): string
    {
        return $this->doencascronicas;
    }

    public function getRemediosRegulares(): string
    {
        return $this->remediosregulares;
    }

=======
    public function meta()
    {
        return $this->belongsTo(Meta::class, 'meta_id');
    }
>>>>>>> 2c7c640da83d507ce21f744c9f644e20fbdc1a4b
}
