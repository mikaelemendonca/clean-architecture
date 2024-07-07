<?php

namespace Alura\Arquitetura\Gameficacao\Dominio\Selo;

use Alura\Arquitetura\Gameficacao\Dominio\Cpf;

class Selo
{
    public function __construct(
        private Cpf $cpfAluno,
        private string $nome
    ) {
    }

    public function cpfAluno(): Cpf
    {
        return $this->cpfAluno;
    }

    public function __toString()
    {
        return $this->nome;
    }
}
