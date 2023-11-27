<?php

namespace Alura\Arquitetura\Aluno;

use Alura\Arquitetura\Cpf;
use Alura\Arquitetura\Email;

class Aluno
{
    private Cpf $cpf;
    private string $nome;
    private Email $email;
    private array $telefones;

    public function __construct(
        Cpf $cpf,
        string $nome,
        Email $email
    ) {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->email = $email;
    }

    // named constructors
    public static function comCpfNomeEEmail(
        string $numeroCpf,
        string $email,
        string $nome
    ): self {
        return new Aluno(
            new Cpf($numeroCpf),
            $nome,
            new Email($email)
        );
    }

    public function addTelefone(string $ddd, string $numero): self
    {
        $this->telefones[] = new Telefone($ddd, $numero);
        return $this;
    }
}
