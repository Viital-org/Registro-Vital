<?php

namespace profissionalSaude;

class profissionalSaude{
    private $id;
    private $areaAtuacao;
    private $email;
    private $enderecoAtuacao;
    private $localFormacao;
    private $dataFormacao;
    private $descricaoPerfil;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getAreaAtuacao(){
        return $this->areaAtuacao;
    }

    public function setAreaAtuacao($areaAtuacao){
        $this->areaAtuacao = $areaAtuacao;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEnderecoAtuacao(){
        return $this->enderecoAtuacao;
    }

    public function setEnderecoAtuacao($enderecoAtuacao){
        $this->enderecoAtuacao = $enderecoAtuacao;
    }

    public function getLocalFormacao(){
        return $this->localFormacao;
    }

    public function setLocalFormacao($localFormacao){
        $this->localFormacao = $localFormacao;
    }

    public function getDataFormacao(){
        return $this->dataFormacao;
    }

    public function setDataFormacao($dataFormacao){
        $this->dataFormacao = $dataFormacao;
    }

    public function getDescricaoPerfil(){
        return $this->descricaoPerfil;
    }

    public function setDescricaoPerfil($descricaoPerfil){
        $this->descricaoPerfil = $descricaoPerfil;
    }

    public function cadastrarAtividade(){
        // PENDENTE - FAZER
    }

    public function atualizarDados(){
        // PENDETE - FAZER
    }
}