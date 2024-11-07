<?php

namespace App\Models;

use Faker\Provider\UserAgent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

    public function endereco()
    {
        return $this->hasMany(Endereco::class,'usuario_id');
    }

    public static function resetaSenha($email)
    {
        // Recupera o usuário com base no e-mail
        $usuario = Usuario::where('email', $email)->first();

        if ($usuario) {
            $novaSenha = Str::random(10);

            $usuario->senha = $novaSenha; // Garante que a senha seja criptografada
            $usuario->save();

            return $novaSenha;
        }

        return false; // Retorna false se o usuário não for encontrado
    }
}
