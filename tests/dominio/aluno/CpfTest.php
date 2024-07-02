<?php

namespace Alura\Arquitetura\Tests\Dominio\Aluno;

use Alura\Arquitetura\Dominio\Cpf;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    public function testCpfNumeroNoFormatoInvalidoNaoDevePoderExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Cpf(numero: '12345678910');
    }

    public function testCpfDevePoderSerRepresentadoComoString()
    {
        $cpf = new Cpf(numero: '123.456.789-10');
        $this->assertSame('123.456.789-10', (string) $cpf);
    }
}
