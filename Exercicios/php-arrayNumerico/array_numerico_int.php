<?php
    // ========================================================
    // Processa array de inteiros positivos e negativos
    // ========================================================

    // Verifica se foi enviado algo
    if (!isset($_POST['numeros'])) {
        echo "Erro: nenhum número enviado.";
        exit;
    }

    // Transforma string em array e converte cada item para inteiro
    $entrada = $_POST['numeros'];
    $numeros = array_map('intval', explode(',', $entrada));

    // Mostra o array original
    echo "<h2>Array Original</h2><pre>";
    print_r($numeros);
    echo "</pre>";

    // Soma manual
    $soma = array_sum($numeros);
    echo "<p><strong>Soma:</strong> $soma</p>";

    // Média
    $media = $soma / count($numeros);
    echo "<p><strong>Média:</strong> $media</p>";

    // Maior e menor
    echo "<p><strong>Maior:</strong> " . max($numeros) . " | <strong>Menor:</strong> " . min($numeros) . "</p>";

    // Ordenação
    sort($numeros);
    echo "<h3>Ordenado</h3><pre>";
    print_r($numeros);
    echo "</pre>";

    // Inversão
    $invertido = array_reverse($numeros);
    echo "<h3>Invertido</h3><pre>";
    print_r($invertido);
    echo "</pre>";

    // Separar pares e ímpares
    $pares = $impares = [];
    foreach ($numeros as $n) {
        if ($n % 2 === 0) $pares[] = $n;
        else $impares[] = $n;
    }
    echo "<h3>Pares</h3><pre>"; print_r($pares); echo "</pre>";
    echo "<h3>Ímpares</h3><pre>"; print_r($impares); echo "</pre>";

    // Múltiplos de 3
    $multiplos3 = 0;
    foreach ($numeros as $n) {
        if ($n !== 0 && $n % 3 === 0) $multiplos3++;
    }
    echo "<p><strong>Múltiplos de 3:</strong> $multiplos3</p>";

    // Duplicados removidos
    $unicos = array_unique($numeros);
    echo "<h3>Sem Duplicados</h3><pre>"; print_r($unicos); echo "</pre>";
?>