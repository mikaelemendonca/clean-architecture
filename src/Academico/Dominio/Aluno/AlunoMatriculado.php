<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

use Alura\Arquitetura\Academico\Dominio\Cpf;
use Alura\Arquitetura\Academico\Dominio\Evento;
use DateTimeImmutable;

class AlunoMatriculado implements Evento
{
    private DateTimeImmutable $momento;

    public function __construct(
        private Cpf $cpf
    ) {
        $this->momento = new DateTimeImmutable();
    }

    public function cpfAluno(): Cpf
    {
        return $this->cpf;
    }

    public function momento(): DateTimeImmutable
    {
        return $this->momento;
    }
}
