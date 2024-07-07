<?php

namespace Alura\Arquitetura\Academico\Infra;

use Alura\Arquitetura\Academico\Aplicacao\Indicacao\EnviaEmailIndicao;
use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;

class EnvioEmailIndicacaoPhpMailer implements EnviaEmailIndicao
{
    public function enviaPara(Aluno $aluno): void
    {
        return;
    }
}
