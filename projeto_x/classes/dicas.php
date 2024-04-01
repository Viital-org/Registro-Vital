<?php 

class dicas
{
    public int $id;
    public string $titulo;
    public string $descricao;
    
    public function __construct(int $id, string $titulo, string $descricao)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descricao = $descricao;
    }

    public function envia_dica()
    {

    }

    public function deleta_dica()
    {
        
    }
}