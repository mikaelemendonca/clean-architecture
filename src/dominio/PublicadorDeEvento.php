<?php

namespace Alura\Arquitetura\Dominio;

class PublicadorDeEvento
{
    /**
     * @var OuvinteDeEvento[]
     */
    private $ouvintes = [];

    public function adicionarOuvinte(OuvinteDeEvento $ouvinte): void
    {
        $this->ouvintes[] = $ouvinte;
    }

    public function publicar(Evento $evento): void
    {
        foreach ($this->ouvintes as $ouvinte) {
            $ouvinte->processa($evento);
        }
    }
}
