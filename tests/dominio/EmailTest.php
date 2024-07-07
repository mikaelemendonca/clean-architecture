<?php

namespace Alura\Arquitetura\Academico\Tests\Dominio;

use Alura\Arquitetura\Academico\Dominio\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testEmailNoFormatoInvalidoNaoDevePoderExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email(endereco: 'email');
    }

    public function testEmailDevePoderSerRepresentadoComoString()
    {
        $email = new Email(endereco: 'endereco@example.com');
        $this->assertSame('endereco@example.com', (string) $email);
    }
}
