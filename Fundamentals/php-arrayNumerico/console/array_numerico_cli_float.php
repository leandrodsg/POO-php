<?php
    // ==========================================================
    // ARQUIVO: array_numerico_cli_float.php
    // DESCRIÇÃO: Operações manuais com array de floats (decimais)
    // ==========================================================

    echo "=== ARRAY DE FLOATS ===\n";

    $numeros = [-1.5, 3.2, 0.0, 4.8, -2.3, 3.0, 6.6, 3.0];

    // Mostrar array original
    echo "\nArray original:\n";
    foreach ($numeros as $n) {
        echo $n . " ";
    }
    echo "\n";

    // Soma e contagem
    $soma = 0;
    $quantidade = 0;
    foreach ($numeros as $n) {
        $soma += $n;
        $quantidade = $quantidade + 1;
    }
    echo "\nSoma: $soma\n";
    echo "Quantidade de elementos: $quantidade\n";

    // Média
    $media = $soma / $quantidade;
    echo "Média: $media\n";

    // Maior e menor
    $maior = $numeros[0];
    $menor = $numeros[0];
    foreach ($numeros as $n) {
        if ($n > $maior) {
            $maior = $n;
        }
        if ($n < $menor) {
            $menor = $n;
        }
    }
    echo "Maior: $maior | Menor: $menor\n";

    // Ordenação manual
    $ordenado = $numeros;
    for ($i = 0; $i < $quantidade; $i++) {
        for ($j = 0; $j < $quantidade - 1; $j++) {
            if ($ordenado[$j] > $ordenado[$j + 1]) {
                $tmp = $ordenado[$j];
                $ordenado[$j] = $ordenado[$j + 1];
                $ordenado[$j + 1] = $tmp;
            }
        }
    }
    echo "\nOrdenado:\n";
    foreach ($ordenado as $n) {
        echo $n . " ";
    }
    echo "\n";

    // Invertido manualmente
    $invertido = [];
    for ($i = $quantidade - 1; $i >= 0; $i--) {
        $invertido[] = $numeros[$i];
    }
    echo "\nInvertido:\n";
    foreach ($invertido as $n) {
        echo $n . " ";
    }
    echo "\n";

    // Pares e ímpares inteiros dentro de floats
    $pares = [];
    $impares = [];
    foreach ($numeros as $n) {
        if ((int)$n == $n) {
            if ($n % 2 == 0) {
                $pares[] = $n;
            } else {
                $impares[] = $n;
            }
        }
    }
    echo "\nPares Inteiros:\n";
    foreach ($pares as $n) echo "$n ";
    echo "\nÍmpares Inteiros:\n";
    foreach ($impares as $n) echo "$n ";
    echo "\n";

    // Múltiplos de 3 usando fmod (sem contar 0)
    $multiplos3 = 0;
    foreach ($numeros as $n) {
        if ($n !== 0) {
            if (fmod($n, 3) === 0.0) {
                $multiplos3 = $multiplos3 + 1;
            }
        }
    }
    echo "Múltiplos de 3: $multiplos3\n";

    // Remoção de duplicados manual
    $unicos = [];
    foreach ($numeros as $n) {
        $ja_existe = false;
        foreach ($unicos as $u) {
            if ($u === $n) {
                $ja_existe = true;
            }
        }
        if (!$ja_existe) {
            $unicos[] = $n;
        }
    }
    echo "\nSem Duplicados:\n";
    foreach ($unicos as $n) echo "$n ";
    echo "\n";
?>