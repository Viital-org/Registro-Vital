<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<Usuario>
 */
class UsuarioFactory extends Factory
{
    public static ?string $password;
    protected $model = Usuario::class;

    public function definition(): array
    {
        return [
            'nome_completo' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'senha' => static::$password ??= Hash::make('password'),
            'situacao_cadastro' => $this->faker->randomElement([0, 1]),
            'tipo_usuario' => $this->faker->randomElement([1, 2, 3]), // 1 = Paciente, 2 = Profissional, 3 = Admin
            'telefone_1' => $this->generatePhoneNumber(),
            'telefone_2' => $this->faker->optional()->boolean ? $this->generatePhoneNumber() : null,
            'data_cadastro' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    public function pacientePadrao(): static
    {
        return $this->state(fn(array $attributes) => [
            'nome_completo' => 'Paciente',
            'email' => 'paciente@paciente.com',
            'tipo_usuario' => 1,
            'senha' => '123123123',
        ]);
    }

    public function profissionalPadrao(): static
    {
        return $this->state(fn(array $attributes) => [
            'nome_completo' => 'Profissional',
            'email' => 'profissional@paciente.com',
            'tipo_usuario' => 2,
            'senha' =>'123123123',
        ]);
    }

    public function adminPadrao(): static
    {
        return $this->state(fn(array $attributes) => [
            'nome_completo' => 'Administrador',
            'email' => 'administrador@paciente.com',
            'tipo_usuario' => 3,
            'senha' =>'123123123',
        ]);
    }

    protected function generatePhoneNumber(): string
    {
        $ddd = $this->faker->numberBetween(11, 99);
        $prefixo = $this->faker->numberBetween(90000, 99999);
        $sufixo = $this->faker->numberBetween(1000, 9999);

        return sprintf('%02d%05d%04d', $ddd, $prefixo, $sufixo);
    }

    /**
     * Indica que o endereço de e-mail do modelo deve estar não verificado.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}