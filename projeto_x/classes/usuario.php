<?php 

// CLASSE ABSTRATA
class User 
{

    public int $id;
    protected string $nome;
    public $categoria;
    protected string $cpf;
    public string $genero;
    public string $login;
    protected string $senha;
    public string $email;
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

    public function cria_usuario()
    {

    }

    public function deleta_usuario()
    {

    }

}


// PACIENTE
class Paciente extends User 
{
    protected string $endereco; 
    protected string $cep;
    protected string $doenca_cronica;
    protected string $remedio_regular;

}

// MEDICO
class Medico extends User 
{
    public string $area_atuacao;
    public string $endereco_atuacao;
    public string $local_formacao;
    public string $data_formacao;

    public function cadastrar_atividade()
    {

    }

    public function atualiza_anamnese()
    {

    }
}
