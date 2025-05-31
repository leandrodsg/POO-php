<?php
    // array_alunos.php

    // Simula um array associativo com lista de alunos, suas notas e presença
    $alunos = [
        ['nome' => 'Alice',   'nota' => 8.5, 'frequencia' => 92],
        ['nome' => 'Bruno',   'nota' => 5.0, 'frequencia' => 60],
        ['nome' => 'Carlos',  'nota' => 6.8, 'frequencia' => 85],
        ['nome' => 'Daniela', 'nota' => 9.3, 'frequencia' => 100],
        ['nome' => 'Erika',   'nota' => 4.2, 'frequencia' => 70],
    ];

    echo "<h1>Análise de Desempenho Escolar</h1>";

    // ---------------------------------------------------------
    // 1. Listar todos os alunos com suas notas e frequência
    // ---------------------------------------------------------
    echo "<h3>1. Lista de Alunos:</h3>";
    foreach ($alunos as $a) {
        echo "{$a['nome']} - Nota: {$a['nota']} - Frequência: {$a['frequencia']}%<br>";
    }

    // ---------------------------------------------------------
    // 2. Calcular a média geral da turma
    // ---------------------------------------------------------
    $totalNotas = 0;
    foreach ($alunos as $a) {
        $totalNotas += $a['nota'];
    }
    $mediaGeral = $totalNotas / count($alunos);
    echo "<h3>2. Média geral da turma: " . number_format($mediaGeral, 2, ',', '.') . "</h3>";

    // ---------------------------------------------------------
    // 3. Classificar alunos como Aprovado ou Reprovado
    // Critério: nota >= 6 e frequência >= 75%
    // ---------------------------------------------------------
    echo "<h3>3. Situação dos alunos (Aprovado/Reprovado):</h3>";
    foreach ($alunos as $a) {
        $situacao = ($a['nota'] >= 6 && $a['frequencia'] >= 75) ? "Aprovado" : "Reprovado";
        echo "{$a['nome']} → $situacao<br>";
    }

    // ---------------------------------------------------------
    // 4. Encontrar aluno com a maior e menor nota
    // ---------------------------------------------------------
    $maior = $alunos[0];
    $menor = $alunos[0];

    foreach ($alunos as $a) {
        if ($a['nota'] > $maior['nota']) $maior = $a;
        if ($a['nota'] < $menor['nota']) $menor = $a;
    }
    echo "<h3>4. Maior nota: {$maior['nome']} ({$maior['nota']})</h3>";
    echo "<h3>   Menor nota: {$menor['nome']} ({$menor['nota']})</h3>";

    // ---------------------------------------------------------
    // 5. Ordenar por nota decrescente
    // ---------------------------------------------------------
    usort($alunos, fn($a, $b) => $b['nota'] <=> $a['nota']);
    echo "<h3>5. Alunos ordenados por nota (descendente):</h3>";
    foreach ($alunos as $a) {
        echo "{$a['nome']} - Nota: {$a['nota']}<br>";
    }

    // ---------------------------------------------------------
    // 6. Contar quantos foram aprovados
    // ---------------------------------------------------------
    $aprovados = array_filter($alunos, function($a) {
        return $a['nota'] >= 6 && $a['frequencia'] >= 75;
    });
    echo "<h3>6. Total de aprovados: " . count($aprovados) . "</h3>";
?>