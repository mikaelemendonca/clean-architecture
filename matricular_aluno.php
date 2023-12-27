<?php

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Infra\RepositorioAlunosEmMemoria;

require 'vendor/autoload.php';

$cpf = '000.000.000-00';
$nome = 'Mika';
$email = 'mika@aa.com';
$ddd = '79';
$numero = '999999999';

$aluno = Aluno::comCpfNomeEEmail(
    $cpf,
    $nome,
    $email
)->addTelefone($ddd, $numero);

$repositorio = new RepositorioAlunosEmMemoria();
$repositorio->adicionar($aluno);
