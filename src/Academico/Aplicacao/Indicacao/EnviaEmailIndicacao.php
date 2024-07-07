<?php

namespace Alura\Arquitetura\Academico\Aplicacao\Indicacao;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;

interface EnviaEmailIndicao
{
    public function enviaPara(Aluno $aluno): void;
}
