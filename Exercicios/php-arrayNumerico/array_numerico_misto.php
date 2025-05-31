<?php
    // ========================================================
    // Processa array misto (int + float) vindo via POST
    // Exibe diversas operações sobre os números recebidos
    // ========================================================

    // Verifica se o campo 'numeros' foi enviado via POST
    if (!isset($_POST['numeros'])) {
        echo "Erro: nenhum número enviado.";
        exit; // Encerra o script se não houver dados
    }

    // Recebe a string enviada via POST e quebra por vírgula
    // Em seguida, converte cada valor para float
    $entrada = $_POST['numeros'];
    $numeros = array_map('floatval', explode(',', $entrada));

    // Exibe o array original recebido
    echo "<h2>Array Original</h2><pre>";
    print_r($numeros);
    echo "</pre>";

    // Calcula a soma de todos os valores do array
    $soma = array_sum($numeros);

    // Calcula a média dividindo a soma pela quantidade de elementos
    $media = $soma / count($numeros);

    echo "<p><strong>Soma:</strong> $soma</p>";
    echo "<p><strong>Média:</strong> $media</p>";

    // Encontra o maior e menor valor usando funções nativas
    echo "<p><strong>Maior:</strong> " . max($numeros) . " | <strong>Menor:</strong> " . min($numeros) . "</p>";

    // Ordena os números do menor para o maior
    sort($numeros);
    echo "<h3>Ordenado</h3><pre>";
    print_r($numeros);
    echo "</pre>";

    // Inverte a ordem do array ordenado
    $invertido = array_reverse($numeros);
    echo "<h3>Invertido</h3><pre>";
    print_r($invertido);
    echo "</pre>";

    // Separa números inteiros pares e ímpares
    // Apenas os valores que são equivalentes ao seu int (ex: 3.0)
    $pares = $impares = [];
    foreach ($numeros as $n) {
        if ((int)$n == $n) { // Verifica se é um inteiro
            if ($n % 2 === 0) {
                $pares[] = $n;
            } else {
                $impares[] = $n;
            }
        }
    }

    echo "<h3>Pares Inteiros</h3><pre>";
    print_r($pares);
    echo "</pre>";

    echo "<h3>Ímpares Inteiros</h3><pre>";
    print_r($impares);
    echo "</pre>";

    // Conta quantos números são múltiplos de 3
    // Usamos fmod() pois % não é seguro com floats
    $multiplos3 = 0;
    foreach ($numeros as $n) {
        // Evita considerar o zero e garante múltiplo exato
        if ($n !== 0) {
            if (fmod($n, 3) === 0.0) {
                $multiplos3++;
            }
        }
    }

    echo "<p><strong>Múltiplos de 3:</strong> $multiplos3</p>";

    // Remove duplicatas mantendo apenas os primeiros valores únicos
    $unicos = array_unique($numeros);
    echo "<h3>Sem Duplicados</h3><pre>";
    print_r($unicos);
    echo "</pre>";
?>