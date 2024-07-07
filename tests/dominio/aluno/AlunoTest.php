<?php

namespace Alura\Arquitetura\Academico\Tests\Dominio\Aluno;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\Email;
use Alura\Arquitetura\Academico\Dominio\Cpf;
use Alura\Arquitetura\Academico\Dominio\Aluno\AlunoComDoisTelefones;
use PHPUnit\Framework\TestCase;

class AlunoTest extends TestCase
{
    private Aluno $aluno;

    public function setUp(): void
    {
        $this->aluno = new Aluno(
            $this->createStub(Cpf::class),
            '',
            $this->createStub(Email::class),
        );
    }

    public function testAdicionarAlunoComMaisDe2Telefones()
    {
        $this->expectException(AlunoComDoisTelefones::class);
        $this->aluno->addTelefone('79', '99999999999');
        $this->aluno->addTelefone('79', '33333333');
        $this->aluno->addTelefone('79', '44444444');
    }

    public function testAdicionarAlunoCom2Telefones()
    {
        $this->aluno->addTelefone('79', '99999999999');
        $this->aluno->addTelefone('79', '33333333');
        $this->assertCount(2, $this->aluno->telefones());
    }

    public function testAdicionarAlunoCom1Telefone()
    {
        $this->aluno->addTelefone('79', '99999999999');
        $this->assertCount(1, $this->aluno->telefones());
    }
}
