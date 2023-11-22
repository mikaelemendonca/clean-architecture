<?php

namespace Alura\Arquitetura;

class FabricaAluno
{
    private Aluno $aluno;

    public function comCpfEmailENome(
        string $numeroCpf,
        string $email,
        string $nome
    ): self {
        $this->aluno = new Aluno(
            new Cpf($numeroCpf),
            $nome,
            new Email($email)
        );

        return $this;
    }

    public function addTelefone(string $ddd, string $numero): self
    {
        $this->aluno->addTelefone($ddd, $numero);
        return $this;
    }

    public function getAluno() : Aluno
    {
        return $this->aluno;
    }
}

// $fab = new FabricaAluno();
// $aluno = $fab
//     ->comCpfEmailENome(numeroCpf: '', email: '', nome: '')
//     ->addTelefone(ddd: '', numero: '')
//     ->addTelefone(ddd: '', numero: '')
//     ->getAluno();
