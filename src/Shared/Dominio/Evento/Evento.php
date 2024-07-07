<?php

namespace Alura\Arquitetura\Shared\Dominio\Evento;

use DateTimeImmutable;
use JsonSerializable;

interface Evento extends JsonSerializable
{
    public function momento(): DateTimeImmutable;
    public function getNome(): string;
}
