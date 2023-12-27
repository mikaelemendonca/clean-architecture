<?php

namespace Alura\Arquitetura\Infra;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\AlunoNaoEncontrado;
use Alura\Arquitetura\Dominio\Aluno\RepositorioDeAluno;
use Alura\Arquitetura\Dominio\Cpf;

class RepositorioAlunosEmMemoria implements RepositorioDeAluno
{
    private $alunos = [];

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
