<?php

namespace projeto_x\classes;

class Paciente extends User
{
    protected string $endereco;
    protected string $cep;
    protected string $doenca_cronica;
    protected string $remedio_regular;

    public function __construct(int $id, string $nome, string $email, string $cpf, string $genero, string $login, string $senha, string $telefone, string $data_nasc, string $endereco, string $cep, string $doenca_cronica, string $remedio_regular)
    {
        parent::__construct($id, $nome, $email, $cpf, $genero, $login, $senha, $telefone, $data_nasc);
        $this->endereco = $endereco;
        $this->cep = $cep;
        $this->doenca_cronica = $doenca_cronica;
        $this->remedio_regular = $remedio_regular;
    }

    public function getEndereco(): string
    {
        return $this->endereco;
    }

    public function setEndereco(string $endereco): void
    {
        $this->endereco = $endereco;
    }

    public function getCep(): string
    {
        return $this->cep;
    }

    public function setCep(string $cep): void
    {
        $this->cep = $cep;
    }

    public function getDoencaCronica(): string
    {
        return $this->doenca_cronica;
    }

    public function setDoencaCronica(string $doenca_cronica): void
    {
        $this->doenca_cronica = $doenca_cronica;
    }

    public function getRemedioRegular(): string
    {
        return $this->remedio_regular;
    }

    public function setRemedioRegular(string $remedio_regular): void
    {
        $this->remedio_regular = $remedio_regular;
    }
}