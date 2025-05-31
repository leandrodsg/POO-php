<?php
    // ========================================================
    // Processa array de floats (decimais positivos e negativos)
    // ========================================================

    if (!isset($_POST['numeros'])) {
        echo "Erro: nenhum número enviado.";
        exit;
    }

    // Converte os valores em float
    $entrada = $_POST['numeros'];
    $numeros = array_map('floatval', explode(',', $entrada));

    echo "<h2>Array Original</h2><pre>";
    print_r($numeros);
    echo "</pre>";

    // Soma e média
    $soma = array_sum($numeros);
    $media = $soma / count($numeros);
    echo "<p><strong>Soma:</strong> $soma</p>";
    echo "<p><strong>Média:</strong> $media</p>";

    // Maior / menor
    echo "<p><strong>Maior:</strong> " . max($numeros) . " | <strong>Menor:</strong> " . min($numeros) . "</p>";

    // Ordenado
    sort($numeros);
    echo "<h3>Ordenado</h3><pre>";
    print_r($numeros);
    echo "</pre>";

    // Invertido
    $invertido = array_reverse($numeros);
    echo "<h3>Invertido</h3><pre>";
    print_r($invertido);
    echo "</pre>";

    // Pares / ímpares não se aplicam diretamente, mas vamos mostrar inteiros por aproximação
    $pares = $impares = [];
    foreach ($numeros as $n) {
        if ((int)$n == $n) {
            if ($n % 2 === 0) $pares[] = $n;
            else $impares[] = $n;
        }
    }
    echo "<h3>Pares Inteiros</h3><pre>"; print_r($pares); echo "</pre>";
    echo "<h3>Ímpares Inteiros</h3><pre>"; print_r($impares); echo "</pre>";

    // Múltiplos de 3 com fmod
    $multiplos3 = 0;
    foreach ($numeros as $n) {
        if ($n !== 0 && fmod($n, 3) === 0.0) $multiplos3++;
    }
    echo "<p><strong>Múltiplos de 3:</strong> $multiplos3</p>";

    // Duplicados removidos
    $unicos = array_unique($numeros);
    echo "<h3>Sem Duplicados</h3><pre>"; print_r($unicos); echo "</pre>";
?>