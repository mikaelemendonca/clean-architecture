<?php

namespace Alura\Arquitetura\Gamificacao\Aplicacao;

use Alura\Arquitetura\Gamificacao\Dominio\Selo\Selo;
use Alura\Arquitetura\Gamificacao\Dominio\Selo\RepositorioDeSelo;
use Alura\Arquitetura\Shared\Dominio\Evento\Evento;
use Alura\Arquitetura\Shared\Dominio\Evento\OuvinteDeEvento;

class GeraSeloDeNovato extends OuvinteDeEvento
{
    public function __construct(
        private RepositorioDeSelo $repositorioDeSelo
    ) {
    }

    public function sabeProcessar(Evento $evento): bool
    {
        return $evento->getNome() === 'aluno_matriculado';
    }

    public function reageAo(Evento $evento): void
    {
        $dados = $evento->jsonSerialize();
        $cpf = $dados['cpf'];

        $selo = new Selo($cpf, 'Novato');
        $this->repositorioDeSelo->adiciona($selo);
    }
}
