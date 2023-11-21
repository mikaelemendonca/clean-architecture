<?php

namespace Alura\Arquitetura\Tests;

use Alura\Arquitetura\Email;
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
        var_dump($email);
        $this->assertSame('endereco@example.com', (string) $email);
    }
}
