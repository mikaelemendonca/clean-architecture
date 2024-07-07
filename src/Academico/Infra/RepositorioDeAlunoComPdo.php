<?php

namespace Alura\Arquitetura\Academico\Infra;

use Alura\Arquitetura\Academico\Dominio\Cpf;
use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\AlunoNaoEncontrado;
use Alura\Arquitetura\Academico\Dominio\Aluno\RepositorioDeAluno;
use PDO;

class RepositorioDeAlunoComPdo implements RepositorioDeAluno
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

        $sql = "INSERT INTO VALUES (:ddd, :telefone, :cpf_aluno)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue('cpf_aluno', $aluno->cpf());

        foreach ($aluno->telefones() as $telefone) {
            $stmt->bindValue('ddd', $telefone->ddd());
            $stmt->bindValue('telefone', $telefone->telefone());
            $stmt->execute();
        }
    }
    
    public function buscarPorCpf(Cpf $cpf): Aluno
    {
        $sql = "SELECT 
                    cpf, nome, email, ddd, numero AS numero_telefone
                FROM alunos a
                LEFT JOIN telefones t ON (t.cpf_aluno = a.cpf)
                WHERE a.cpf = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, (string) $cpf);
        $stmt->execute();

        $dadosAluno = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($dadosAluno) === 0) {
            throw new AlunoNaoEncontrado($cpf);
        }

        return $this->mapearAluno($dadosAluno);
    }
    
    /** @return Aluno[] */
    public function buscarTodos(): array
    {
        $sql = "SELECT 
                    cpf, nome, email, ddd, numero AS numero_telefone
                FROM alunos a
                LEFT JOIN telefones t ON (t.cpf_aluno = a.cpf)";
        $stmt = $this->conexao->query($sql);
        // $stmt = $this->conexao->prepare($sql);
        // $stmt->execute();

        $alunos = [];
        $listaAlunos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        foreach ($listaAlunos as $dadosAluno) {
            if (!array_key_exists($dadosAluno['cpf'], $alunos)) {
                $alunos[$dadosAluno['cpf']] = Aluno::comCpfNomeEEmail(
                    $dadosAluno['cpf'],
                    $dadosAluno['nome'],
                    $dadosAluno['email'],
                );
            }

            // bug por aqui
            $alunos[$dadosAluno['cpf']]->addTelefone(
                $dadosAluno['ddd'],
                $dadosAluno['numero_telefone']
            );
        }

        return array_values($alunos);
    }

    private function mapearAluno(array $dadosAluno): Aluno
    {
        $primeiraLinha = $dadosAluno[0];
        $aluno = Aluno::comCpfNomeEEmail(
            $primeiraLinha['cpf'],
            $primeiraLinha['nome'],
            $primeiraLinha['email']
        );
        $telefones = array_filter(
            $dadosAluno,
            fn ($linha) => $linha['ddd'] !== null && $linha['numero_telefone'] !== null
        );

        foreach ($telefones as $telefone) {
            $aluno->addTelefone(
                $telefone['ddd'],
                $telefone['numero_telefone'],
            );
        }

        return $aluno;
    }
}
