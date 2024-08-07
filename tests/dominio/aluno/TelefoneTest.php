<?php

namespace Alura\Arquitetura\Academico\Tests\Dominio\Aluno;

use Alura\Arquitetura\Academico\Dominio\Aluno\Telefone;
use PHPUnit\Framework\TestCase;

class TelefoneTest extends TestCase
{
    public function testTelefoneDevePoderSerRepresentadoComoString()
    {
        $telefone = new Telefone(ddd: '24', numero: '22222222');
        $this->assertSame('(24)22222222', (string) $telefone);
    }

    public function testTelefoneComDddInvalidoNaoDeveExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        // $this->expectDeprecationMessage('DDD inválido');
        new Telefone(ddd: 'ddd', numero: '22222222');
    }

    public function testTelefoneComNumeroInvalidoNaoDeveExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        // $this->expectDeprecationMessage('Número de telefone inválido');
        new Telefone(ddd: '24', numero: 'numero');
    }
}
