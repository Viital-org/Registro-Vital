<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

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
     * Os atributos que devem ser convertidos.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }

    public function tipoUsuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'tipo_usuario');
    }

    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'usuario_id');
    }

    public function profissional()
    {
        return $this->hasOne(Profissional::class, 'usuario_id');
    }

    public function administrador()
    {
        return $this->hasOne(Administrador::class, 'usuario_id');
    }
}
