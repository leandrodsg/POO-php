<?php
    // eventos_cli.php

    $eventos = [
        ["titulo" => "Reunião", "data" => "2025-05-20"],
        ["titulo" => "Entrega", "data" => "2025-05-30"],
        ["titulo" => "Workshop", "data" => "2025-06-01"],
        ["titulo" => "Retrospectiva", "data" => "2025-05-01"]
    ];

    // Data atual (simulada)
    $hoje = "2025-05-30";

    echo "Agenda de Eventos (modo CLI)\n\n";

    // 1. Classificação temporal (passado, hoje, futuro)
    echo "1. Status dos eventos em relação a hoje ($hoje):\n";
    for ($i = 0; $i < count($eventos); $i++) {
        $data = $eventos[$i]["data"];
        if ($data < $hoje) {
            echo "- {$eventos[$i]['titulo']} → PASSADO\n";
        } elseif ($data === $hoje) {
            echo "- {$eventos[$i]['titulo']} → HOJE\n";
        } else {
            echo "- {$eventos[$i]['titulo']} → FUTURO\n";
        }
    }

    // 2. Agrupamento por mês
    echo "\n2. Agrupamento por mês:\n";
    $grupos = [];
    for ($i = 0; $i < count($eventos); $i++) {
        $data = $eventos[$i]["data"];
        $mes = substr($data, 0, 7); // yyyy-mm

        $achou = false;
        for ($j = 0; $j < count($grupos); $j++) {
            if ($grupos[$j]["mes"] === $mes) {
                $grupos[$j]["titulos"][] = $eventos[$i]["titulo"];
                $achou = true;
                break;
            }
        }

        if (!$achou) {
            $grupos[] = ["mes" => $mes, "titulos" => [$eventos[$i]["titulo"]]];
        }
    }
    for ($i = 0; $i < count($grupos); $i++) {
        echo "- " . $grupos[$i]["mes"] . ": ";
        for ($j = 0; $j < count($grupos[$i]["titulos"]); $j++) {
            echo $grupos[$i]["titulos"][$j];
            if ($j < count($grupos[$i]["titulos"]) - 1) echo ", ";
        }
        echo "\n";
    }
