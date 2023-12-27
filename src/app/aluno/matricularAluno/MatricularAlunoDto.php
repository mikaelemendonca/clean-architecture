<?php

namespace Alura\Arquitetura\App\Aluno\MatricularAluni;

class MatricularAlunoDto
{
    public string $cpfAluno;
    public string $nomeAluno;
    public string $emailAluno;

    public function __construct(
        string $cpfAluno,
        string $nomeAluno,
        string $emailAluno
    ) {
        $this->cpfAluno = $cpfAluno;
        $this->nomeAluno = $nomeAluno;
        $this->emailAluno = $emailAluno;
    }
}
