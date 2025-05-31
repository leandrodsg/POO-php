<?php
// array_associativo_avancado.php

// Verifica se o formulário foi enviado corretamente
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["array_input"])) {
    $entrada = $_POST["array_input"];

    // Transforma a string enviada em um array associativo usando eval
    // Uso controlado! Nunca execute eval com entrada pública sem sanitização!
    $array = [];
    eval("\$array = $entrada;");

    echo "<h2>Array Recebido</h2><pre>";
    print_r($array);
    echo "</pre>";

    // ----------------------------------------------------
    // 1. Verificação de valores que são palíndromos
    // ----------------------------------------------------
    echo "<h3>1. Verificando palíndromos nos valores:</h3>";
    foreach ($array as $chave => $valor) {
        if (is_string($valor)) {
            // Remove espaços e símbolos para análise
            $limpo = strtolower(preg_replace("/[^a-z]/", "", $valor));
            if ($limpo !== '' && $limpo === strrev($limpo)) {
                echo "[$chave] é um palíndromo: $valor<br>";
            }
        }
    }

    // ----------------------------------------------------
    // 2. Identificar valores que parecem e-mails com regex
    // ----------------------------------------------------
    echo "<h3>2. Verificando valores com formato de e-mail (usando regex):</h3>";
    foreach ($array as $chave => $valor) {
        if (is_string($valor) && preg_match("/^[^@\s]+@[^@\s]+\.[a-z]{2,}$/i", $valor)) {
            echo "[$chave] contém um e-mail válido: $valor<br>";
        }
    }

    // ----------------------------------------------------
    // 3. Checar se o valor é numérico (string ou número)
    // ----------------------------------------------------
    echo "<h3>3. Verificando valores numéricos:</h3>";
    foreach ($array as $chave => $valor) {
        if (is_numeric($valor)) {
            echo "[$chave] é numérico: $valor<br>";
        }
    }

    // ----------------------------------------------------
    // 4. Detectar valores duplicados (verificação avançada)
    // ----------------------------------------------------
    echo "<h3>4. Verificando valores duplicados:</h3>";
    $duplicados = array_diff_assoc($array, array_unique($array));
    if (!empty($duplicados)) {
        print_r($duplicados);
    } else {
        echo "Nenhum valor duplicado foi encontrado.";
    }

    // ----------------------------------------------------
    // 5. Ordenação do array por chave (ascendente)
    // ----------------------------------------------------
    echo "<h3>5. Ordenando por chave (ksort):</h3>";
    ksort($array); // Altera o array original
    print_r($array);

    // ----------------------------------------------------
    // 6. Filtrar valores com mais de 3 palavras
    // ----------------------------------------------------
    echo "<h3>6. Filtrar valores com mais de 3 palavras:</h3>";
    $filtrados = array_filter($array, function($valor) {
        return is_string($valor) && str_word_count($valor) > 3;
    });
    print_r($filtrados);

    // ----------------------------------------------------
    // 7. Transformar chave-valor em string (para logs)
    // ----------------------------------------------------
    echo "<h3>7. Conversão chave-valor para string (formato de log):</h3>";
    foreach ($array as $k => $v) {
        echo strtoupper($k) . ": " . $v . "<br>";
    }

    // ----------------------------------------------------
    // 8. Agrupar valores repetidos (frequência)
    // ----------------------------------------------------
    echo "<h3>8. Frequência de valores (quantas vezes aparecem):</h3>";
    $frequencias = array_count_values(array_map('strval', array_values($array)));
    print_r($frequencias);

    // ----------------------------------------------------
    // 9. Detecção de arrays aninhados (1 nível)
    // ----------------------------------------------------
    echo "<h3>9. Detectar se algum valor é um sub-array:</h3>";
    foreach ($array as $chave => $valor) {
        if (is_array($valor)) {
            echo "[$chave] contém um array aninhado.<br>";
            print_r($valor);
        }
    }

} else {
    // Se o usuário não usou o formulário, exibe uma instrução
    echo "<p>Volte para o <a href='index.php'>formulário inicial</a> para inserir um array.</p>";
}
?>
