<?php

namespace Alura\Arquitetura\Gamificacao\Aplicacao;

use Alura\Arquitetura\Gamificacao\Dominio\Selo\RepositorioDeSelo;
use Alura\Arquitetura\Shared\Dominio\Cpf;

class BuscarSelosUsuario
{
    public function __construct(
        private RepositorioDeSelo $repositorioDeSelo
    ) {
    }

    public function executa(BuscarSelosUsuarioDto $dados): array
    {
        $cpfAluno = new Cpf($dados->cpf);
        return $this->repositorioDeSelo->selosDeAlunoComCpf($cpfAluno);
    }
}
