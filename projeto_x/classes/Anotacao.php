<?php

namespace projeto_x\classes;
class Anotacao
{
    public int $id;
    public int $id_usuario;
    public string $data_anotacao;
    public string $titulo;
    public string $anotacao;
    public string $tipo_anotacao;
    public bool $visivel;

    public function __construct(int $id, int $id_usuario, string $data_anotacao, string $titulo, string $anotacao, string $tipo_anotacao, bool $visivel)
    {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->data_anotacao = $data_anotacao;
        $this->titulo = $titulo;
        $this->anotacao = $anotacao;
        $this->tipo_anotacao = $tipo_anotacao;
        $this->visivel = $visivel;
    }

    public function deleta_anotacao()
    {

    }

    public function altera_visibilidade()
    {

    }
}
