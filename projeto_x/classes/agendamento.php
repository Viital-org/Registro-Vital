<?php 

class consulta 
{
    public int $id;
    public string $data;
    public string $status;
    public string $nome_profissional;
    public string $especialidade;
    public string $profissional;
    public string $paciente;
    public float $valor_consulta;

    public function __construct(int $id, string $data, string $status, string $nome_profissional, string $especialidade, string $profissional, string $paciente, float $valor_consulta)
    {
        $this->id = $id;
        $this->data = $data;
        $this->status = $status;
        $this->nome_profissional = $nome_profissional;
        $this->especialidade = $especialidade;
        $this->profissional = $profissional;
        $this->paciente = $paciente;
        $this->valor_consuta = $valor_consulta;
    }

    public function avalia_consuta()
    {

    }

    public function conslui_consulta()
    {

    } 
}

class agenda_de_consutas 
{
    public int $id;
    public int $id_profissional;
    public string $data_agendamento;
    public string $consuta_nome;

    public function __construct(int $id, int $id_profissional, string $data_agendamento, string $consuta_nome)
    {
        $this->id = $id;
        $this->id_profissional = $id_profissional;
        $this->data_agendamento = $data_agendamento;
        $this->consuta_nome = $consuta_nome;
    }

    public function exclui_consuta()
    {
        
    }
}