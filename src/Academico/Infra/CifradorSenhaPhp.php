<?php

namespace Alura\Arquitetura\Academico\Infra;

use Alura\Arquitetura\Academico\Dominio\Aluno\CifradorSenha;

class CifradorSenhaPhp implements CifradorSenha
{
    public function cifrar(string $senha): string
    {
        return password_hash($senha, PASSWORD_ARGON2I);
    }

    public function verificar(string $senhaEmTexto, string $senhaCrifrada): bool
    {
        return password_hash($senhaEmTexto, PASSWORD_ARGON2I) === $senhaCrifrada;
    }
}
