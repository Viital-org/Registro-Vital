<?php
use projeto_x\classes\User;
require_once '..\classes\User.php';
require_once '..\classes\Paciente.php';
require_once '..\classes\ProfissionalSaude.php';

/*
// Testando construtor
$user = new User(1, 'John Doe', 'categoria', '123.456.789-00', 'male', 'johndoe', 'password', 'johndoe@example.com', '123456789', '1990-01-01');
echo "Testando o construtor:\n";
var_dump($user);
*/

/*
// Testando getter
$user = new User(1, 'John Doe', 'categoria', '123.456.789-00', 'male', 'johndoe', 'password', 'johndoe@example.com', '123456789', '1990-01-01');
echo "\nTestando getter:\n";
echo "ID: " . $user->getId() . "\n";
echo "Nome: " . $user->getNome() . "\n";
echo "Categoria: " . $user->getCategoria() . "\n";
echo "CPF: " . $user->getCpf() . "\n";
echo "Gênero: " . $user->getGenero() . "\n";
echo "Login: " . $user->getLogin() . "\n";
echo "Senha: " . $user->getSenha() . "\n";
echo "Email: " . $user->getEmail() . "\n";
echo "Telefone: " . $user->getTelefone() . "\n";
echo "Data de Nascimento: " . $user->getDataNasc() . "\n";
*/

/*
// Testando setter
$user = new User(1, 'John Doe', 'categoria', '123.456.789-00', 'male', 'johndoe', 'password', 'johndoe@example.com', '123456789', '1990-01-01');
echo "\nTestando setter:\n";
$user->setId(2);
$user->setCategoria('categoria 2');
$user->setCpf('987.654.321-00');
$user->setGenero('female');
$user->setLogin('doejoh');
$user->setSenha('123');
$user->setEmail('doejhon@gmail.com');
$user->setTelefone('987654321');
$user->setDataNasc('1990-02-02');

// Verificando setters
echo "ID após set: " . $user->getId() . "\n";
echo "Nome após set: " . $user->getNome() . "\n";
echo "Categoria após set: " . $user->getCategoria() . "\n";
echo "CPF após set: " . $user->getCpf() . "\n";
echo "Gênero após set: " . $user->getGenero() . "\n";
echo "Login após set: " . $user->getLogin() . "\n";
echo "Senha após set: " . $user->getSenha() . "\n";
echo "Email após set: " . $user->getEmail() . "\n";
echo "Telefone após set: " . $user->getTelefone() . "\n";
echo "Data de Nascimento após set: " . $user->getDataNasc() . "\n";
*/

/*
// Teste criar Paciente
$paciente = User::criarPaciente(
    1,
    'João Paciente',
    'Paciente',
    'joao@example.com',
    '123.456.789-00',
    'male',
    'joaop',
    'senha123',
    '123456789',
    '1990-01-01',
    'Rua Paciente, 123',
    '12345-678',
    'Hipertensão',
    'Remédio X'
);
var_dump($paciente);
*/

/*
$profissional = User::criarProfissionalSaude(
    2,
    'Maria Profissional',
    'Profissional de Saúde',
    'maria@example.com',
    '987.654.321-00',
    'female',
    'mariap',
    'senha456',
    '987654321',
    '1990-02-02',
    'Área de Atuação X',
    'Endereço de Atuação Y',
    'Local de Formação Z',
    '2020-01-01',
    'Descrição do Perfil'
);
var_dump($profissional);
*/