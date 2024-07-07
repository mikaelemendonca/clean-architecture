<?php

namespace Alura\Arquitetura\Gamificacao\Aplicacao;

class BuscarSelosUsuarioDto
{
    public function __construct(
        public string $cpf
    ) {
    }
}
