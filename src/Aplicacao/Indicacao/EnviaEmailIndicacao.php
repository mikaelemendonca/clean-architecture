<?php

namespace Alura\Arquitetura\Aplicacao\Indicacao;

use Alura\Arquitetura\Dominio\Aluno\Aluno;

interface EnviaEmailIndicao
{
    public function enviaPara(Aluno $aluno): void;
}
