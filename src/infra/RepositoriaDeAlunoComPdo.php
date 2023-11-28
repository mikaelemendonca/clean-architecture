<?php

namespace Alura\Arquitetura\Infra;

use Alura\Arquitetura\Dominio\Cpf;
use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\RepositoriaDeAluno;
use PDO;

class RepositoriaDeAlunoComPdo implements RepositoriaDeAluno
{
    private PDO $conexao;

    public function __construct(\PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    public function adicionar(Aluno $aluno): void
    {
        $sql = "INSERT INTO alunos VALUES (:cpf, :nome, :email)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue('cpf', $aluno->cpf());
        $stmt->bindValue('nome', $aluno->nome());
        $stmt->bindValue('email', $aluno->email());
        $stmt->execute();

        foreach ($aluno->telefones() as $telefone) {
            $sql = "INSERT INTO VALUES (:ddd, :telefone, :cpf_aluno)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue('ddd', $telefone->ddd());
            $stmt->bindValue('telefone', $telefone->telefone());
            $stmt->bindValue('cpf_aluno', $aluno->cpf());
            $stmt->execute();
        }
    }
    
    public function buscarPorCpf(Cpf $cpf): Aluno
    {
        return new Aluno();
    }
    
    /** @return Aluno[] */
    public function buscarTodos(): array
    {
        return [];
    }
}
