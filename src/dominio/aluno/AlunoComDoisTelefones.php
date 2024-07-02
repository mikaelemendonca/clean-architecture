<?php

namespace Alura\Arquitetura\Dominio\Aluno;

class AlunoComDoisTelefones extends \DomainException
{
    public function __construct()
    {
        parent::__construct("Aluno já tem dois telefones. Não pode adicionar outro.");
    }
}
