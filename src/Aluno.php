<?php

namespace Alura\Arquitetura;

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

        // new Aluno(
        //     new Cpf('123'),
        //     'Mika',
        //     new Email('email')
        // )->adicionarTelefone('79', '996435832')
    }

    public function addTelefone(string $ddd, string $numero)
    {
        $this->telefones[] = new Telefone($ddd, $numero);
    }
}
