<?php

namespace projeto_x\classes;

class ProfissionalSaude extends User
{
    private string $areaAtuacao;
    private string $enderecoAtuacao;
    private string $localFormacao;
    private string $dataFormacao;
    private string $descricaoPerfil;

    public function __construct(int $id, string $nome, string $categoria, string $email, string $cpf, string $genero, string $login, string $senha, string $telefone, string $data_nasc, string $areaAtuacao, string $enderecoAtuacao, string $localFormacao, string $dataFormacao, string $descricaoPerfil)
    {
        parent::__construct($id, $nome, $categoria, $email, $cpf, $genero, $login, $senha, $telefone, $data_nasc);
        $this->areaAtuacao = $areaAtuacao;
        $this->enderecoAtuacao = $enderecoAtuacao;
        $this->localFormacao = $localFormacao;
        $this->dataFormacao = $dataFormacao;
        $this->descricaoPerfil = $descricaoPerfil;
    }

    public function getAreaAtuacao(): string
    {
        return $this->areaAtuacao;
    }

    public function setAreaAtuacao(string $areaAtuacao): void
    {
        $this->areaAtuacao = $areaAtuacao;
    }

    public function getEnderecoAtuacao(): string
    {
        return $this->enderecoAtuacao;
    }

    public function setEnderecoAtuacao(string $enderecoAtuacao): void
    {
        $this->enderecoAtuacao = $enderecoAtuacao;
    }

    public function getLocalFormacao(): string
    {
        return $this->localFormacao;
    }

    public function setLocalFormacao(string $localFormacao): void
    {
        $this->localFormacao = $localFormacao;
    }

    public function getDataFormacao(): string
    {
        return $this->dataFormacao;
    }

    public function setDataFormacao(string $dataFormacao): void
    {
        $this->dataFormacao = $dataFormacao;
    }

    public function getDescricaoPerfil(): string
    {
        return $this->descricaoPerfil;
    }

    public function setDescricaoPerfil(string $descricaoPerfil): void
    {
        $this->descricaoPerfil = $descricaoPerfil;
    }

    public function cadastrarAtividade()
    {
        // PENDENTE - FAZER
    }

    public function atualizarDados()
    {
        // PENDETE - FAZER
    }
}