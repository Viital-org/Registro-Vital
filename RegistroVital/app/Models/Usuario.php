<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'usuarios';

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'nome_completo',
        'email',
        'senha',
        'situacao_cadastro',
        'tipo_usuario',
        'telefone_1',
        'telefone_2',
    ];

    /**
     * Os atributos que devem ser ocultados durante a serialização.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'senha',
        'remember_token',
    ];

    /**
     * Os atributos que devem ser convertidos para os seus tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setSenhaAttribute($password)
    {
        $this->attributes['senha'] = bcrypt($password);
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }

    /**
     * Relacionamento com o tipo de usuário.
     */
    public function tipoUsuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'tipo_usuario');
    }

    /**
     * Relacionamento com o modelo Paciente.
     */
    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'usuario_id');
    }

    /**
     * Relacionamento com o modelo Profissional.
     */
    public function profissional()
    {
        return $this->hasOne(Profissional::class, 'usuario_id');
    }

    /**
     * Relacionamento com o modelo Administrador.
     */
    public function administrador()
    {
        return $this->hasOne(Administrador::class, 'usuario_id');
    }
}
