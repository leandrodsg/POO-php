<?php
    // ==========================================================
    // ARQUIVO: array_numerico_cli_int.php
    // DESCRIÇÃO: Versão super didática para estudar algoritmos com inteiros
    // ==========================================================

    echo "=== ARRAY DE INTEIROS (Versão Básica) ===\n";

    // Criamos um array com números inteiros positivos e negativos
    $numeros = array(-5, 0, 3, -2, 6, 9, 3, -5, 12);

    // Mostramos o array original com um loop
    echo "\nArray original:\n";
    for ($i = 0; $i < count($numeros); $i++) {
        echo $numeros[$i] . " ";
    }
    echo "\n";

    // Contamos quantos números existem e somamos todos
    $soma = 0;
    $quantidade = 0;
    for ($i = 0; $i < count($numeros); $i++) {
        $soma = $soma + $numeros[$i];
        $quantidade = $quantidade + 1;
    }

    echo "\nSoma: " . $soma . "\n";
    echo "Quantidade: " . $quantidade . "\n";

    // Calculamos a média
    $media = $soma / $quantidade;
    echo "Média: " . $media . "\n";

    // Descobrimos o maior e o menor número
    $maior = $numeros[0];
    $menor = $numeros[0];

    for ($i = 0; $i < $quantidade; $i++) {
        if ($numeros[$i] > $maior) {
            $maior = $numeros[$i];
        }
        if ($numeros[$i] < $menor) {
            $menor = $numeros[$i];
        }
    }
    echo "Maior: " . $maior . " | Menor: " . $menor . "\n";

    // Ordenamos manualmente com bubble sort
    $ordenado = $numeros;

    for ($i = 0; $i < $quantidade; $i++) {
        for ($j = 0; $j < $quantidade - 1; $j++) {
            if ($ordenado[$j] > $ordenado[$j + 1]) {
                $temporario = $ordenado[$j];
                $ordenado[$j] = $ordenado[$j + 1];
                $ordenado[$j + 1] = $temporario;
            }
        }
    }

    echo "\nOrdenado:\n";
    for ($i = 0; $i < $quantidade; $i++) {
        echo $ordenado[$i] . " ";
    }
    echo "\n";

    // Invertido manualmente
    echo "\nInvertido:\n";
    for ($i = $quantidade - 1; $i >= 0; $i--) {
        echo $numeros[$i] . " ";
    }
    echo "\n";

    // Separar pares e ímpares
    $pares = array();
    $impares = array();

    for ($i = 0; $i < $quantidade; $i++) {
        if ($numeros[$i] % 2 == 0) {
            $pares[] = $numeros[$i];
        } else {
            $impares[] = $numeros[$i];
        }
    }

    echo "\nPares:\n";
    for ($i = 0; $i < count($pares); $i++) {
        echo $pares[$i] . " ";
    }

    echo "\nÍmpares:\n";
    for ($i = 0; $i < count($impares); $i++) {
        echo $impares[$i] . " ";
    }
    echo "\n";

    // Contar múltiplos de 3 (sem contar o zero)
    $multiplos3 = 0;
    for ($i = 0; $i < $quantidade; $i++) {
        if ($numeros[$i] != 0) {
            if ($numeros[$i] % 3 == 0) {
                $multiplos3 = $multiplos3 + 1;
            }
        }
    }
    echo "Múltiplos de 3 (exceto zero): " . $multiplos3 . "\n";

    // Remover duplicados sem usar array_unique
    $sem_duplicados = array();

    for ($i = 0; $i < $quantidade; $i++) {
        $repetido = false;

        for ($j = 0; $j < count($sem_duplicados); $j++) {
            if ($numeros[$i] == $sem_duplicados[$j]) {
                $repetido = true;
            }
        }

        if ($repetido == false) {
            $sem_duplicados[] = $numeros[$i];
        }
    }

    echo "\nSem Duplicados:\n";
    for ($i = 0; $i < count($sem_duplicados); $i++) {
        echo $sem_duplicados[$i] . " ";
    }
    echo "\n";
?>