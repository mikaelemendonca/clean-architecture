<?php

namespace Alura\Arquitetura\Indicacao;

use Alura\Arquitetura\Aluno\Aluno;

class Indicacao
{
    private Aluno $indicate;
    private Aluno $indicado;
    private \DateTimeImmutable $data;

    public function __construct(Aluno $indicate, Aluno $indicado)
    {
        $this->indicate = $indicate;
        $this->indicado = $indicado;
        $this->data = new \DateTimeImmutable();
    }
}
