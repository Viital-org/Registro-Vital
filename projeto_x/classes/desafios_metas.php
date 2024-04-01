<?php 

class desafios_metas
{
    public int $id;
    public string $nome;
    public string $descricao;
    public string $data_inicio;
    public string $data_fim;
    public string $status;

    public function __construct(int $id, string $nome, string $descricao, string $data_inicio, string $data_fim, string $status)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->data_inicio = $data_inicio;
        $this->data_fim = $data_fim;
        $this->status = $status;
    }

    public function remove_desafios_metas()
    {
        
    }
}