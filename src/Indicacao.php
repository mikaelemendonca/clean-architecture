<?php

namespace Alura\Arquitetura;

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
