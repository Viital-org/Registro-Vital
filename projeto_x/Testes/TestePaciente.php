<?php

require_once '..\classes\User.php';
use projeto_x\classes\Paciente;
require_once '..\classes\Paciente.php';
require_once '..\classes\ProfissionalSaude.php';

/*
// Testando construtor
$paciente = new Paciente(1, 'Maria', 'Paciente', 'maria@example.com', '123.456.789-00', 'Feminino', 'maria123', 'senha123', '123456789', '1990-01-01', 'Rua do Paciente, 123', '12345-678', 'Hipertensão', 'Remédio X');
echo "Testando o construtor:\n";
var_dump($paciente);
*/

/*
//Testando getter
$paciente = new Paciente(1, 'Maria', 'Paciente', 'maria@example.com', '123.456.789-00', 'Feminino', 'maria123', 'senha123', '123456789', '1990-01-01', 'Rua do Paciente, 123', '12345-678', 'Hipertensão', 'Remédio X');
echo "Testando getter:\n";
echo "ID: " . $paciente->getId() . "\n";
echo "Nome: " . $paciente->getNome() . "\n";
echo "Categoria: " . $paciente->getCategoria() . "\n";
echo "Email: " . $paciente->getEmail() . "\n";
echo "CPF: " . $paciente->getCpf() . "\n";
echo "Gênero: " . $paciente->getGenero() . "\n";
echo "Login: " . $paciente->getLogin() . "\n";
echo "Senha: " . $paciente->getSenha() . "\n";
echo "Telefone: " . $paciente->getTelefone() . "\n";
echo "Data de Nascimento: " . $paciente->getDataNasc() . "\n";
echo "Endereço: " . $paciente->getEndereco() . "\n";
echo "CEP: " . $paciente->getCep() . "\n";
echo "Doença Crônica: " . $paciente->getDoencaCronica() . "\n";
echo "Remédio Regular: " . $paciente->getRemedioRegular() . "\n";
*/
/*
// Testando setter
$paciente = new Paciente(1, 'Maria', 'Paciente', 'maria@example.com', '123.456.789-00', 'Feminino', 'maria123', 'senha123', '123456789', '1990-01-01', 'Rua do Paciente, 123', '12345-678', 'Hipertensão', 'Remédio X');
echo "\nTestando setter:\n";
$paciente->setId(2);
$paciente->setNome('João');
$paciente->setCategoria('Paciente VIP');
$paciente->setEmail('joao@example.com');
$paciente->setCpf('987.654.321-00');
$paciente->setGenero('Masculino');
$paciente->setLogin('joao123');
$paciente->setSenha('novaSenha');
$paciente->setTelefone('987654321');
$paciente->setDataNasc('1990-02-02');
$paciente->setEndereco('Rua do João, 456');
$paciente->setCep('54321-987');
$paciente->setDoencaCronica('Diabetes');
$paciente->setRemedioRegular('Insulina');

// Verificando setters
echo "ID após set: " . $paciente->getId() . "\n";
echo "Nome após set: " . $paciente->getNome() . "\n";
echo "Categoria após set: " . $paciente->getCategoria() . "\n";
echo "Email após set: " . $paciente->getEmail() . "\n";
echo "CPF após set: " . $paciente->getCpf() . "\n";
echo "Gênero após set: " . $paciente->getGenero() . "\n";
echo "Login após set: " . $paciente->getLogin() . "\n";
echo "Senha após set: " . $paciente->getSenha() . "\n";
echo "Telefone após set: " . $paciente->getTelefone() . "\n";
echo "Data de Nascimento após set: " . $paciente->getDataNasc() . "\n";
echo "Endereço após set: " . $paciente->getEndereco() . "\n";
echo "CEP após set: " . $paciente->getCep() . "\n";
echo "Doença Crônica após set: " . $paciente->getDoencaCronica() . "\n";
echo "Remédio Regular após set: " . $paciente->getRemedioRegular() . "\n";
*/

