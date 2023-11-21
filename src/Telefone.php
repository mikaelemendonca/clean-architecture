<?php

namespace Alura\Arquitetura;

use Stringable;

class Telefone implements Stringable
{
    private string $ddd;
    private string $numero;

    public function __construct(string $ddd, string $numero)
    {
        $this->ddd = $ddd; 
        $this->numero = $numero; 
    }


    public function __toString(): string
    {
        return $this->numero;
    }
}
