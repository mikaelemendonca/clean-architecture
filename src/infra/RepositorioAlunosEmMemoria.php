<?php

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\AlunoNaoEncontrado;
use Alura\Arquitetura\Dominio\Aluno\RepositoriaDeAluno;

class RepositorioAlunosEmMemoria implements RepositoriaDeAluno
{
    private $alunos = [];

    public function __construct(Aluno $aluno)
    {
        $this->alunos[] = $aluno;
    }

    public function adicionar(Aluno $aluno): void
    {
        $this->alunos[] = $aluno;
    }

    public function buscarPorCpf(Cpf $cpf): Aluno
    {
        $alunosFiltratos =  array_filter(
            $this->alunos,
            fn (Aluno $aluno) => $aluno->cpf() == $cpf
        );

        if (count($alunosFiltratos) === 0) {
            throw new AlunoNaoEncontrado($cpf);
        }

        if (count($alunosFiltratos) > 1) {
            throw new \Exception('');
        }

        return $alunosFiltratos[0];
    }

    /** @return Aluno[] */
    public function buscarTodos(): array
    {
        return $this->alunos;
    }
}