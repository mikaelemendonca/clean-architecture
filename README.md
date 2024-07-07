# clean_architecture_php

# ddd_domain_driven_design

Liguagem Ubíqua
Especialistas do negócio e os especialistas técnicos, ou seja, desenvolvedores, falem a mesma linguagem, os mesmos termos.

Aggregates
Classe de Alunos contendo Telefones e gerenciando suas regras de negócio, gerencia o controle de acesso.
Além disso, a persistência deve ser feito tudo no Repositório de Aluno.

Eventos
Representa uma ação que aconteceu
Ex.: AlunoMatriculado
Serve para a aplicação reagir de forma flexível.

Contextos Delimitados
Separar a aplicação para poder se tornar componetes isolados.
Padrão Mapa de Contextos.
Padrão Shared Karnel.


>> php matricular_aluno.php "123.456.789-00" "Mika" "m@e.com" "79" "999999999"
