<?php
use projeto_x\classes\ProfissionalSaude;
require_once '..\classes\User.php';
require_once '..\classes\Paciente.php';
require_once '..\classes\ProfissionalSaude.php';

/*
// Testando construtor
$profissional = new ProfissionalSaude(1, 'Dr. João', 'Profissional de Saúde', 'joao@example.com', '123.456.789-00', 'Masculino', 'joao123', 'senha123', '123456789', '1990-01-01', 'Cardiologia', 'Hospital Central', 'Universidade Federal', '2010-12-31', 'Profissional experiente na área de cardiologia.');echo "Testando o construtor:\n";
echo "Testando o construtor:\n";
var_dump($profissional);
*/

/*
// Testando getters
$profissional = new ProfissionalSaude(1, 'Dr. João', 'Profissional de Saúde', 'joao@example.com', '123.456.789-00', 'Masculino', 'joao123', 'senha123', '123456789', '1990-01-01', 'Cardiologia', 'Hospital Central', 'Universidade Federal', '2010-12-31', 'Profissional experiente na área de cardiologia.');echo "Testando o construtor:\n";
echo "Testando os getters:\n";
echo "ID: " . $profissional->getId() . "\n";
echo "Nome: " . $profissional->getNome() . "\n";
echo "Categoria: " . $profissional->getCategoria() . "\n";
echo "Email: " . $profissional->getEmail() . "\n";
echo "CPF: " . $profissional->getCpf() . "\n";
echo "Gênero: " . $profissional->getGenero() . "\n";
echo "Login: " . $profissional->getLogin() . "\n";
echo "Senha: " . $profissional->getSenha() . "\n";
echo "Telefone: " . $profissional->getTelefone() . "\n";
echo "Data de Nascimento: " . $profissional->getDataNasc() . "\n";
echo "Área de Atuação: " . $profissional->getAreaAtuacao() . "\n";
echo "Endereço de Atuação: " . $profissional->getEnderecoAtuacao() . "\n";
echo "Local de Formação: " . $profissional->getLocalFormacao() . "\n";
echo "Data de Formação: " . $profissional->getDataFormacao() . "\n";
echo "Descrição de Perfil: " . $profissional->getDescricaoPerfil() . "\n";
*/

/*
// Testando setter
$profissional = new ProfissionalSaude(1, 'Dr. João', 'Profissional de Saúde', 'joao@example.com', '123.456.789-00', 'Masculino', 'joao123', 'senha123', '123456789', '1990-01-01', 'Cardiologia', 'Hospital Central', 'Universidade Federal', '2010-12-31', 'Profissional experiente na área de cardiologia.');
echo "\nTestando setter:\n";
$profissional->setId(2);
$profissional->setNome('Dr. Maria');
$profissional->setCategoria('Médica');
$profissional->setEmail('maria@example.com');
$profissional->setCpf('987.654.321-00');
$profissional->setGenero('Feminino');
$profissional->setLogin('maria123');
$profissional->setSenha('novaSenha');
$profissional->setTelefone('987654321');
$profissional->setDataNasc('1990-02-02');
$profissional->setAreaAtuacao('Neurologia');
$profissional->setEnderecoAtuacao('Hospital Municipal');
$profissional->setLocalFormacao('Universidade Estadual');
$profissional->setDataFormacao('2009-11-30');
$profissional->setDescricaoPerfil('Profissional experiente na área de neurologia.');

// Verificando setters
echo "ID após set: " . $profissional->getId() . "\n";
echo "Nome após set: " . $profissional->getNome() . "\n";
echo "Categoria após set: " . $profissional->getCategoria() . "\n";
echo "Email após set: " . $profissional->getEmail() . "\n";
echo "CPF após set: " . $profissional->getCpf() . "\n";
echo "Gênero após set: " . $profissional->getGenero() . "\n";
echo "Login após set: " . $profissional->getLogin() . "\n";
echo "Senha após set: " . $profissional->getSenha() . "\n";
echo "Telefone após set: " . $profissional->getTelefone() . "\n";
echo "Data de Nascimento após set: " . $profissional->getDataNasc() . "\n";
echo "Área de Atuação após set: " . $profissional->getAreaAtuacao() . "\n";
echo "Endereço de Atuação após set: " . $profissional->getEnderecoAtuacao() . "\n";
echo "Local de Formação após set: " . $profissional->getLocalFormacao() . "\n";
echo "Data de Formação após set: " . $profissional->getDataFormacao() . "\n";
echo "Descrição de Perfil após set: " . $profissional->getDescricaoPerfil() . "\n";
*/
