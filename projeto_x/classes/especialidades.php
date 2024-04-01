<?php 

// AREA DE ATUACAO
class area_atuacao
{
    public int $id;
    public string $nome_area;
    public string $especializacao;
    public string $descricao_area;

    public function __construct(int $id, string $nome_area, string $especializacao, string $descricao_area)
    {
        $this->id = $id;
        $this->nome_area = $nome_area;
        $this->especializacao = $especializacao;
        $this->descricao_area = $descricao_area;
    }

    public function new_area()
    {

    }

    public function remove_area(int $id) 
    {

    }
}

// ESPECIALIZACAO
class especializacao extends area_atuacao 
{
    public int $id;
    public string $nome_especializacao;
    public string $area_atuacao;
    public int $tempo_especializacao;
    public string $descricao;

    public function nova_especializacao()
    {

    }

    public function remove_especailizacao()
    {

    }    
}