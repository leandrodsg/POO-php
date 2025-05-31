<?php
    // tarefas_cli.php

    // Lista de tarefas com título, status e prioridade
    $tarefas = [
        ["titulo" => "Estudar PHP", "status" => "feito", "prioridade" => "alta"],
        ["titulo" => "Comprar comida", "status" => "pendente", "prioridade" => "media"],
        ["titulo" => "Limpar casa", "status" => "pendente", "prioridade" => "alta"],
        ["titulo" => "Assistir aula", "status" => "feito", "prioridade" => "baixa"]
    ];

    echo "Checklist de Tarefas (modo CLI)\n\n";

    // 1. Contar tarefas por status
    echo "1. Contagem por status:\n";
    $contagem = [];
    for ($i = 0; $i < count($tarefas); $i++) {
        $status = $tarefas[$i]["status"];
        $encontrado = false;
        for ($j = 0; $j < count($contagem); $j++) {
            if ($contagem[$j]["status"] === $status) {
                $contagem[$j]["qtd"]++;
                $encontrado = true;
                break;
            }
        }
        if (!$encontrado) {
            $contagem[] = ["status" => $status, "qtd" => 1];
        }
    }
    for ($i = 0; $i < count($contagem); $i++) {
        echo "- " . $contagem[$i]["status"] . ": " . $contagem[$i]["qtd"] . "\n";
    }

    // 2. Buscar tarefas que contenham "php"
    echo "\n2. Tarefas com a palavra 'php':\n";
    for ($i = 0; $i < count($tarefas); $i++) {
        $titulo = strtolower($tarefas[$i]["titulo"]);
        if (strpos($titulo, "php") !== false) {
            echo "- " . $tarefas[$i]["titulo"] . "\n";
        }
    }
