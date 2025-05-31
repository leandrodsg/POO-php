<?php
    // =============================================================
    // Versão CLI - Operações básicas com string (sem métodos prontos)
    // =============================================================

    echo "Digite uma string: ";
    $entrada = trim(fgets(STDIN)); // leitura com remoção de \n

    // Remover espaços das bordas manualmente
    $inicio = 0;
    $fim = strlen($entrada) - 1;

    while ($inicio <= $fim && $entrada[$inicio] === ' ') $inicio++;
    while ($fim >= $inicio && $entrada[$fim] === ' ') $fim--;

    $trim = '';
    for ($i = $inicio; $i <= $fim; $i++) {
        $trim .= $entrada[$i];
    }

    // Contar caracteres
    $comprimento = 0;
    for ($i = 0; isset($trim[$i]); $i++) {
        $comprimento++;
    }

    // Transformar para maiúsculas e minúsculas (apenas A-Z)
    $maiuscula = '';
    $minuscula = '';
    for ($i = 0; $i < $comprimento; $i++) {
        $char = $trim[$i];
        $ascii = ord($char);

        // Maiúscula manual (a-z → A-Z)
        if ($ascii >= 97 && $ascii <= 122) {
            $maiuscula .= chr($ascii - 32);
        } else {
            $maiuscula .= $char;
        }

        // Minúscula manual (A-Z → a-z)
        if ($ascii >= 65 && $ascii <= 90) {
            $minuscula .= chr($ascii + 32);
        } else {
            $minuscula .= $char;
        }
    }

    // Substring (primeiros 3)
    $sub = '';
    for ($i = 0; $i < 3 && isset($trim[$i]); $i++) {
        $sub .= $trim[$i];
    }

    // Resultados
    echo "\nString com trim manual: [$trim]\n";
    echo "Comprimento: $comprimento\n";
    echo "Maiúsculas: $maiuscula\n";
    echo "Minúsculas: $minuscula\n";
    echo "Substring (0 a 2): $sub\n";
?>