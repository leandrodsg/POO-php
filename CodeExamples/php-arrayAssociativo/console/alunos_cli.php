<?php
    // alunos_cli.php

    $alunos = [
        ["nome" => "Ana", "nota" => 8.5, "frequencia" => 90],
        ["nome" => "Bruno", "nota" => 5.2, "frequencia" => 60],
        ["nome" => "Clara", "nota" => 7.0, "frequencia" => 80]
    ];

    echo "Sistema de Avaliação Escolar (modo CLI)\n\n";

    // 1. Média geral
    $soma = 0;
    for ($i = 0; $i < count($alunos); $i++) {
        $soma += $alunos[$i]["nota"];
    }
    $media = $soma / count($alunos);
    echo "1. Média geral da turma: $media\n\n";

    // 2. Verificar aprovados (nota >= 6 e frequência >= 75)
    echo "2. Situação dos alunos:\n";
    for ($i = 0; $i < count($alunos); $i++) {
        $a = $alunos[$i];
        $status = ($a["nota"] >= 6 && $a["frequencia"] >= 75) ? "Aprovado" : "Reprovado";
        echo "- {$a['nome']}: $status\n";
    }
