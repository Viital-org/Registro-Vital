<?php

namespace projeto_x\classes;
class User
{

    public int $id;
    public $categoria;
    public string $genero;
    public string $login;
    public string $email;
    protected string $nome;
    protected string $cpf;
    protected string $senha;
    protected string $telefone;
    protected string $data_nasc;


    public function __construct(int $id, string $nome, string $categoria, string $cpf, string $genero, string $login, string $senha, string $email, string $telefone, string $data_nasc)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->categoria = $categoria;
        $this->cpf = $cpf;
        $this->genero = $genero;
        $this->login = $login;
        $this->senha = $senha;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->data_nasc = $data_nasc;
    }

    public static function criarPaciente(int $id, string $nome, string $email, string $cpf, string $genero, string $login, string $senha, string $telefone, string $data_nasc, string $endereco, string $cep, string $doenca_cronica, string $remedio_regular): Paciente
    {
        return new Paciente($id, $nome, $email, $cpf, $genero, $login, $senha, $telefone, $data_nasc, $endereco, $cep, $doenca_cronica, $remedio_regular);
    }

    public static function criarProfissionalSaude(int $id, string $nome, string $email, string $cpf, string $genero, string $login, string $senha, string $telefone, string $data_nasc, string $areaAtuacao, string $enderecoAtuacao, string $localFormacao, string $dataFormacao, string $descricaoPerfil): ProfissionalSaude
    {
        return new ProfissionalSaude($id, $nome, $email, $cpf, $genero, $login, $senha, $telefone, $data_nasc, $areaAtuacao, $enderecoAtuacao, $localFormacao, $dataFormacao, $descricaoPerfil);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getCategoria(): string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): void
    {
        $this->categoria = $categoria;
    }

    public function getGenero(): string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): void
    {
        $this->genero = $genero;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function getDataNasc(): string
    {
        return $this->data_nasc;
    }

    public function setDataNasc(string $data_nasc): void
    {
        $this->data_nasc = $data_nasc;
    }
}
