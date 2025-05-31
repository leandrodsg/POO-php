<?php
    // =============================================================
    // Versão CLI - Validações
    // =============================================================

    echo "Digite um texto: ";
    $texto = trim(fgets(STDIN));

    // Limpar acentos (só os principais)
    $substituidos = ['á'=>'a','à'=>'a','ã'=>'a','â'=>'a','ä'=>'a',
                    'é'=>'e','è'=>'e','ê'=>'e','ë'=>'e',
                    'í'=>'i','ì'=>'i','î'=>'i','ï'=>'i',
                    'ó'=>'o','ò'=>'o','ô'=>'o','õ'=>'o','ö'=>'o',
                    'ú'=>'u','ù'=>'u','û'=>'u','ü'=>'u',
                    'ç'=>'c'];

    $sem_acentos = '';
    for ($i = 0; isset($texto[$i]); $i++) {
        $char = strtolower($texto[$i]);
        $sem_acentos .= $substituidos[$char] ?? $char;
    }

    // Só letras minúsculas
    $limpo = '';
    for ($i = 0; isset($sem_acentos[$i]); $i++) {
        $c = $sem_acentos[$i];
        if (($c >= 'a' && $c <= 'z') || $c === ' ') {
            $limpo .= $c;
        }
    }

    // Contar vogais/consoantes
    $vogais = ['a','e','i','o','u'];
    $v = $c = 0;
    for ($i = 0; isset($limpo[$i]); $i++) {
        if ($limpo[$i] === ' ') continue;
        if (in_array($limpo[$i], $vogais)) $v++;
        else $c++;
    }

    // Contar letra 'a'
    $a_count = 0;
    for ($i = 0; isset($limpo[$i]); $i++) {
        if ($limpo[$i] === 'a') $a_count++;
    }

    // Palavras com mais de 5 letras
    $palavras = [];
    $p = '';
    for ($i = 0; isset($limpo[$i]); $i++) {
        if ($limpo[$i] !== ' ') {
            $p .= $limpo[$i];
        } else {
            if ($p !== '') {
                $palavras[] = $p;
                $p = '';
            }
        }
    }
    if ($p !== '') $palavras[] = $p;

    $longas = [];
    foreach ($palavras as $p) {
        $len = 0;
        while (isset($p[$len])) $len++;
        if ($len > 5) $longas[] = $p;
    }

    // Verificar prefixo
    $prefixo = 'php';
    $comeca = true;
    for ($i = 0; $i < strlen($prefixo); $i++) {
        if (!isset($limpo[$i]) || $limpo[$i] !== $prefixo[$i]) {
            $comeca = false;
            break;
        }
    }

    // Verificar sufixo
    $sufixo = 'tica';
    $len = strlen($limpo);
    $termina = true;
    for ($i = 0; $i < strlen($sufixo); $i++) {
        if (!isset($limpo[$len - strlen($sufixo) + $i]) ||
            $limpo[$len - strlen($sufixo) + $i] !== $sufixo[$i]) {
            $termina = false;
            break;
        }
    }

    // Inverso e palíndromo
    $invertido = '';
    for ($i = strlen($limpo) - 1; $i >= 0; $i--) {
        $invertido .= $limpo[$i];
    }
    $sem_espacos = str_replace(' ', '', $limpo);
    $palindromo = ($sem_espacos === str_replace(' ', '', $invertido));

    // Resultado
    echo "\nVogais: $v | Consoantes: $c\n";
    echo "Letra 'a': $a_count ocorrências\n";
    echo "Palavras com mais de 5 letras:\n";
    foreach ($longas as $p) echo "- $p\n";
    echo "Começa com 'php'? " . ($comeca ? 'Sim' : 'Não') . "\n";
    echo "Termina com 'tica'? " . ($termina ? 'Sim' : 'Não') . "\n";
    echo "É palíndromo? " . ($palindromo ? 'Sim' : 'Não') . "\n";
?>