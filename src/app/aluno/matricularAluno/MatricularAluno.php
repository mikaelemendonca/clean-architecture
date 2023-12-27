<?php

namespace Alura\Arquitetura\App\Aluno\MatricularAluni;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\RepositorioDeAluno;

// padrão de projeto command
// classe para ser chamada em um controller
// ou ser chamada por mensageria (kafka)
class MatricularAluno
{
    private RepositorioDeAluno $repositorio;

    public function __construct(RepositorioDeAluno $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function executa(MatricularAlunoDto $dados): void
    {
        $aluno = Aluno::comCpfNomeEEmail(
            $dados->cpfAluno,
            $dados->nomeAluno,
            $dados->emailAluno
        );
        $this->repositorio->adicionar($aluno);
    }
}
