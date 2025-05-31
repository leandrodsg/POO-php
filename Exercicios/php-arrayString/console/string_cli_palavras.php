<?php
    // =============================================================
    // Versão CLI - Análise de frase (palavras únicas, contagem)
    // =============================================================

    echo "Digite uma frase: ";
    $frase = trim(fgets(STDIN));

    // Remover pontuação básica manualmente
    $limpa = '';
    for ($i = 0; isset($frase[$i]); $i++) {
        $c = $frase[$i];
        if ($c !== '.' && $c !== ',' && $c !== '!' && $c !== '?') {
            $limpa .= $c;
        }
    }

    // Separar palavras por espaço (sem explode)
    $palavras = [];
    $palavra = '';
    for ($i = 0; isset($limpa[$i]); $i++) {
        if ($limpa[$i] !== ' ') {
            $palavra .= $limpa[$i];
        } else {
            if ($palavra !== '') {
                $palavras[] = strtolower($palavra);
                $palavra = '';
            }
        }
    }
    if ($palavra !== '') {
        $palavras[] = strtolower($palavra);
    }

    // Contagem de palavras
    $contador = 0;
    foreach ($palavras as $_) $contador++;

    // Palavras únicas
    $unicas = [];
    foreach ($palavras as $p) {
        $jaExiste = false;
        foreach ($unicas as $u) {
            if ($p === $u) {
                $jaExiste = true;
                break;
            }
        }
        if (!$jaExiste) $unicas[] = $p;
    }

    // Resultado
    echo "\nTotal de palavras: $contador\n";
    echo "Palavras únicas:\n";
    foreach ($unicas as $u) {
        echo "- $u\n";
    }
?>