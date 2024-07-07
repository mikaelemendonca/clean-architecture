<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

use Alura\Arquitetura\Shared\Dominio\Cpf;
use Alura\Arquitetura\Shared\Dominio\Evento\Evento;
use DateTimeImmutable;

class AlunoMatriculado implements Evento
{
    private DateTimeImmutable $momento;

    public function __construct(
        private Cpf $cpf
    ) {
        $this->momento = new DateTimeImmutable();
    }

    public function getNome(): string
    {
        return 'aluno_matriculado';
    }

    public function cpfAluno(): Cpf
    {
        return $this->cpf;
    }

    public function momento(): DateTimeImmutable
    {
        return $this->momento;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
