<?php

namespace Alura\Arquitetura\Infra;

use Alura\Arquitetura\App\Indicacao\EnviaEmailIndicao;
use Alura\Arquitetura\Dominio\Aluno\Aluno;

class EnvioEmailIndicacaoPhpMailer implements EnviaEmailIndicao
{
    public function enviaPara(Aluno $aluno): void
    {
        return;
    }
}
