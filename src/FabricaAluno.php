<?php

namespace Alura\Arquitetura;

class FabricaAluno
{
    private Aluno $aluno;

    private string $numeroCpf;
    private string $email;
    private string $nome;
    private array $telefones = [];


    public function comCpfEmailENome(
        string $numeroCpf,
        string $email,
        string $nome
    ): self {
        $this->numeroCpf = $numeroCpf;
        $this->email = $email;
        $this->nome = $nome;

        return $this;
    }

    public function addTelefone(string $ddd, string $numero): self
    {
        $this->telefones[] = ['ddd' => $ddd, 'numero' => $numero];
        
        return $this;
    }

    public function getAluno() : Aluno
    {
        $this->aluno = new Aluno(
            new Cpf($this->numeroCpf),
            $this->nome,
            new Email($this->email)
        );

        foreach ($this->telefones as $telefone) {
            $this->aluno->addTelefone($telefone['ddd'], $telefone['numero']);
        }

        return $this->aluno;
    }
}
