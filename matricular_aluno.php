<?php

use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\LogDeAlunoMatriculado;
use Alura\Arquitetura\Dominio\PublicadorDeEvento;
use Alura\Arquitetura\Infra\RepositorioAlunosEmMemoria;

require 'vendor/autoload.php';

$cpf = $arg[1];
$nome = $arg[2];
$email = $arg[3];
$ddd = $arg[4];
$numero = $arg[5];

$aluno = Aluno::comCpfNomeEEmail(
    $cpf,
    $nome,
    $email
)->addTelefone($ddd, $numero);


$repositorio = new RepositorioAlunosEmMemoria();
// $useCase->executa($aluno);

$publicador = new PublicadorDeEvento();
$publicador->adicionarOuvinte(new LogDeAlunoMatriculado());

$useCase = new MatricularAluno($repositorio, $publicador);
$useCase->executa(new MatricularAlunoDto($cpf, $nome, $email));
