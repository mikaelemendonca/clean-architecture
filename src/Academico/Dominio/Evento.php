<?php

namespace Alura\Arquitetura\Academico\Dominio;

use DateTimeImmutable;

interface Evento
{
    public function momento(): DateTimeImmutable;
}
