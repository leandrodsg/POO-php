<?php
    // array_tarefas.php

    // Simulação de tarefas com diferentes status e prioridades
    $tarefas = [
        ['titulo' => 'Estudar PHP',         'status' => 'feito',        'prioridade' => 'alta'],
        ['titulo' => 'Comprar mantimentos', 'status' => 'pendente',     'prioridade' => 'media'],
        ['titulo' => 'Pagar boletos',       'status' => 'pendente',     'prioridade' => 'alta'],
        ['titulo' => 'Fazer exercício',     'status' => 'em andamento', 'prioridade' => 'baixa'],
        ['titulo' => 'Ler um livro',        'status' => 'feito',        'prioridade' => 'media'],
    ];

    echo "<h1>Gerenciador de Tarefas</h1>";

    // ---------------------------------------------------------
    // 1. Listar todas as tarefas com status e prioridade
    // ---------------------------------------------------------
    echo "<h3>1. Lista completa de tarefas:</h3>";
    foreach ($tarefas as $t) {
        echo "{$t['titulo']} - Status: {$t['status']} - Prioridade: {$t['prioridade']}<br>";
    }

    // ---------------------------------------------------------
    // 2. Filtrar tarefas pendentes
    // ---------------------------------------------------------
    echo "<h3>2. Tarefas pendentes:</h3>";
    foreach ($tarefas as $t) {
        if ($t['status'] === 'pendente') {
            echo "- {$t['titulo']}<br>";
        }
    }

    // ---------------------------------------------------------
    // 3. Contar tarefas por status
    // ---------------------------------------------------------
    echo "<h3>3. Quantidade de tarefas por status:</h3>";
    $contagem = [];
    foreach ($tarefas as $t) {
        $status = $t['status'];
        if (!isset($contagem[$status])) {
            $contagem[$status] = 0;
        }
        $contagem[$status]++;
    }
    foreach ($contagem as $status => $qtd) {
        echo "$status: $qtd tarefa(s)<br>";
    }

    // ---------------------------------------------------------
    // 4. Buscar tarefas com palavra-chave (ex: "estudar")
    // ---------------------------------------------------------
    $busca = "estudar";
    echo "<h3>4. Tarefas que contêm a palavra-chave '$busca':</h3>";
    foreach ($tarefas as $t) {
        if (stripos($t['titulo'], $busca) !== false) {
            echo "- {$t['titulo']}<br>";
        }
    }

    // ---------------------------------------------------------
    // 5. Agrupar tarefas por prioridade
    // ---------------------------------------------------------
    echo "<h3>5. Agrupamento por prioridade:</h3>";
    $prioridades = [];
    foreach ($tarefas as $t) {
        $p = $t['prioridade'];
        if (!isset($prioridades[$p])) {
            $prioridades[$p] = [];
        }
        $prioridades[$p][] = $t['titulo'];
    }
    foreach ($prioridades as $nivel => $titulos) {
        echo ucfirst($nivel) . ": " . implode(", ", $titulos) . "<br>";
    }
?>