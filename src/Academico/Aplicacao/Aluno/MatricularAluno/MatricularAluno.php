<?php

namespace Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\AlunoMatriculado;
use Alura\Arquitetura\Academico\Dominio\Aluno\LogDeAlunoMatriculado;
use Alura\Arquitetura\Academico\Dominio\Aluno\RepositorioDeAluno;
use Alura\Arquitetura\Academico\Dominio\PublicadorDeEvento;

// padrão de projeto command
// classe para ser chamada em um controller
// ou ser chamada por mensageria (kafka)
class MatricularAluno
{
    public function __construct(
        private RepositorioDeAluno $repositorio,
        private PublicadorDeEvento $publicador
    ) {
        $this->repositorio = $repositorio;
        $this->publicador = $publicador;
        // recebe por injeção de dependências
        // já com todos os ouvintes configurados
    }

    public function executa(MatricularAlunoDto $dados): void
    {
        $aluno = Aluno::comCpfNomeEEmail(
            $dados->cpfAluno,
            $dados->nomeAluno,
            $dados->emailAluno
        );
        $this->repositorio->adicionar($aluno);

        $evento = new AlunoMatriculado($aluno->cpf());
        $this->publicador->publicar($evento);
    }
}
