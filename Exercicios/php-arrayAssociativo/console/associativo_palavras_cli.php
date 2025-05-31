<?php
    // associativo_palavras_cli.php

    // Objetivo: Trabalhar com strings associativas sem usar funções como explode, str_replace, array_unique, etc.

    $dados = [
        "frase1" => "php é muito legal",
        "frase2" => "Carlos é desenvolvedor php",
        "frase3" => "php é divertido"
    ];

    // 1. Separar cada frase em palavras (sem explode)
    echo "1. Separando palavras manualmente:\n";
    foreach ($dados as $chave => $frase) {
        $palavras = [];
        $palavra = "";

        for ($i = 0; $i < strlen($frase); $i++) {
            $char = $frase[$i];
            if ($char !== " ") {
                $palavra .= $char;
            } else {
                if ($palavra !== "") {
                    $palavras[] = $palavra;
                    $palavra = "";
                }
            }
        }

        // adiciona a última palavra (caso não termine com espaço)
        if ($palavra !== "") {
            $palavras[] = $palavra;
        }

        echo "$chave: ";
        foreach ($palavras as $p) {
            echo "[$p] ";
        }
        echo "(Total: " . count($palavras) . " palavras)\n";
    }
    echo "\n";

    // 2. Contar quantas vezes a palavra "php" aparece no total
    echo "2. Contar ocorrências da palavra 'php':\n";
    $totalPHP = 0;
    foreach ($dados as $frase) {
        $palavra = "";
        for ($i = 0; $i < strlen($frase); $i++) {
            $char = $frase[$i];
            if ($char !== " ") {
                $palavra .= $char;
            } else {
                if (strtolower($palavra) === "php") {
                    $totalPHP++;
                }
                $palavra = "";
            }
        }
        if (strtolower($palavra) === "php") {
            $totalPHP++;
        }
    }
    echo "Total de vezes que 'php' aparece: $totalPHP\n\n";

    // 3. Substituir "php" por "PHP7" manualmente (simulação de str_replace)
    echo "3. Substituindo 'php' por 'PHP7':\n";
    foreach ($dados as $chave => $frase) {
        $nova = "";
        $buffer = "";

        for ($i = 0; $i < strlen($frase); $i++) {
            $char = $frase[$i];
            if ($char !== " ") {
                $buffer .= $char;
            } else {
                if (strtolower($buffer) === "php") {
                    $nova .= "PHP7 ";
                } else {
                    $nova .= $buffer . " ";
                }
                $buffer = "";
            }
        }
        if (strtolower($buffer) === "php") {
            $nova .= "PHP7";
        } else {
            $nova .= $buffer;
        }

        echo "$chave: $nova\n";
    }
    echo "\n";

    // 4. Mostrar todas as palavras únicas (simulando array_unique)
    echo "4. Palavras únicas no array:\n";
    $todas = [];
    foreach ($dados as $frase) {
        $palavra = "";
        for ($i = 0; $i < strlen($frase); $i++) {
            $char = $frase[$i];
            if ($char !== " ") {
                $palavra .= $char;
            } else {
                if (!in_array($palavra, $todas)) {
                    $todas[] = $palavra;
                }
                $palavra = "";
            }
        }
        if (!in_array($palavra, $todas) && $palavra !== "") {
            $todas[] = $palavra;
        }
    }
    foreach ($todas as $palavra) {
        echo "$palavra\n";
    }
