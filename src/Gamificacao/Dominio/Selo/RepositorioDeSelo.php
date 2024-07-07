<?php

namespace Alura\Arquitetura\Gameficacao\Dominio\Selo;

use Alura\Arquitetura\Academico\Dominio\Cpf;

interface RepositorioDeSelo
{
    public function adiciona(Selo $selo);
    public function selosDeAlunoComCpf(Cpf $cpf);
}
