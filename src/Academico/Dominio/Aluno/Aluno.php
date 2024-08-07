<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

use Alura\Arquitetura\Shared\Dominio\Cpf;
use Alura\Arquitetura\Academico\Dominio\Email;

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
        $this->telefones = [];
    }

    // named constructors
    public static function comCpfNomeEEmail(
        string $numeroCpf,
        string $nome,
        string $email
    ): self {
        return new Aluno(
            new Cpf($numeroCpf),
            $nome,
            new Email($email)
        );
    }

    public function addTelefone(string $ddd, string $numero): self
    {
        if (count($this->telefones) === 2) {
            throw new AlunoComDoisTelefones();
        }

        $this->telefones[] = new Telefone($ddd, $numero);
        return $this;
    }

    /** @return Telefone[] */
    public function telefones(): array
    {
        return $this->telefones;
    }

    public function cpf(): Cpf
    {
        return $this->cpf;
    }

    public function nome(): string
    {
        return $this->nome;
    }

    public function email(): string
    {
        return $this->email;
    }
}
