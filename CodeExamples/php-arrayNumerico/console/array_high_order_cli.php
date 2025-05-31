<?php
    // =============================================================
    // Versão CLI - Simulação de filter, map e reduce manualmente
    // =============================================================

    $numeros = [-5, 0, 3, 8, -2, 7, 12, 1];
    echo "Array original:\n";
    foreach ($numeros as $n) echo "$n ";
    echo "\n\n";

    // -------------------------------
    // Simulando array_filter (pares positivos)
    $pares = [];
    foreach ($numeros as $n) {
        if ($n > 0 && $n % 2 == 0) {
            $pares[] = $n;
        }
    }
    echo "Filter manual (pares positivos):\n";
    foreach ($pares as $p) echo "$p ";
    echo "\n\n";

    // -------------------------------
    // Simulando array_map (eleva ao quadrado)
    $quadrados = [];
    foreach ($numeros as $n) {
        $quadrados[] = $n * $n;
    }
    echo "Map manual (ao quadrado):\n";
    foreach ($quadrados as $q) echo "$q ";
    echo "\n\n";

    // -------------------------------
    // Simulando array_reduce (soma total)
    $soma = 0;
    foreach ($numeros as $n) {
        $soma += $n;
    }
    echo "Reduce manual (soma total): $soma\n";
?>