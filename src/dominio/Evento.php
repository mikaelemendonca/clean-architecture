<?php

namespace Alura\Arquitetura\Dominio;

use DateTimeImmutable;

interface Evento
{
    public function momento(): DateTimeImmutable;
}
