<?php

namespace Alura\Arquitetura\Gamificacao\Infra;

use Alura\Arquitetura\Academico\Dominio\Cpf;
use Alura\Arquitetura\Gameficacao\Dominio\Selo\RepositorioDeSelo;
use Alura\Arquitetura\Gameficacao\Dominio\Selo\Selo;

class RepositorioDeSeloEmMemoria implements RepositorioDeSelo
{
    public function adiciona(Selo $selo)
    {
    }

    public function selosDeAlunoComCpf(Cpf $cpf)
    {
    }
}
