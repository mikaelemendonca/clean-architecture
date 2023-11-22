<?php

namespace Alura\Arquitetura;

class Indicacao
{
    private Aluno $indicate;
    private Aluno $indicado;

    public function __construct(Aluno $indicate, Aluno $indicado)
    {
        $this->indicate = $indicate;
        $this->indicado = $indicado;
    }
}
