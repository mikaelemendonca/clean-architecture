<?php

namespace Alura\Arquitetura\Infra;

use Alura\Arquitetura\Dominio\Aluno\CifradorSenha;

class CifradorSenhaMd5 implements CifradorSenha
{
    public function cifrar(string $senha): string
    {
        return md5($senha);
    }

    public function verificar(string $senhaEmTexto, string $senhaCrifrada): bool
    {
        return md5($senhaEmTexto) === $senhaCrifrada;
    }
}
