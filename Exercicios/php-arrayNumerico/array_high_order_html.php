<?php
    // =============================================================
    // Versão HTML - Uso de array_filter, array_map e array_reduce
    // =============================================================

    // Exemplo de array numérico misto
    $numeros = [-5, 0, 3, 8, -2, 7, 12, 1];

    // Mostra o array original
    echo "<h2>Array Original:</h2><pre>";
    print_r($numeros);
    echo "</pre>";

    // FILTRAGEM: mantém apenas os pares positivos
    $pares = array_filter($numeros, function ($n) {
        return $n > 0 && $n % 2 === 0;
    });
    echo "<h3>array_filter → Pares positivos</h3><pre>";
    print_r($pares);
    echo "</pre>";

    // TRANSFORMAÇÃO: eleva todos os valores ao quadrado
    $quadrados = array_map(function ($n) {
        return $n * $n;
    }, $numeros);
    echo "<h3>array_map → Ao quadrado</h3><pre>";
    print_r($quadrados);
    echo "</pre>";

    // AGREGAÇÃO: soma total dos elementos (com reduce)
    $soma = array_reduce($numeros, function ($acumulador, $n) {
        return $acumulador + $n;
    }, 0);
    echo "<h3>array_reduce → Soma total: $soma</h3>";
?>
