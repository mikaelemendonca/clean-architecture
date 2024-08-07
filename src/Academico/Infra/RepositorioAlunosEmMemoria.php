<?php

namespace Alura\Arquitetura\Academico\Infra;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\AlunoNaoEncontrado;
use Alura\Arquitetura\Academico\Dominio\Aluno\RepositorioDeAluno;
use Alura\Arquitetura\Shared\Dominio\Cpf;

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
