<?php
    // =============================================================
    // Validações avançadas e pegadinhas de entrevistas
    // =============================================================

    $texto = $_POST['texto'] ?? '';

    // Normaliza a string: minúscula, sem acentos, sem espaços
    $clean = strtolower(trim($texto));

    // Remove acentos comuns
    $no_accents = preg_replace(
        ['/[áàãâä]/u','/[éèêë]/u','/[íìîï]/u','/[óòõôö]/u','/[úùûü]/u','/[ç]/u'],
        ['a','e','i','o','u','c'],
        $clean
    );

    // Mantém apenas letras e espaços
    $letters_only = preg_replace('/[^a-z\\s]/', '', $no_accents);

    // Conta vogais e consoantes
    $vogais = ['a','e','i','o','u'];
    $v = $c = 0;
    for ($i = 0; $i < strlen($letters_only); $i++) {
        $char = $letters_only[$i];
        if ($char == ' ') continue;
        if (in_array($char, $vogais)) $v++;
        else $c++;
    }

    // Conta quantas vezes a letra 'a' aparece
    $a_count = substr_count($letters_only, 'a');

    // Identifica palavras com mais de 5 letras
    $palavras = explode(' ', $letters_only);
    $longas = [];
    foreach ($palavras as $p) {
        if (strlen($p) > 5) $longas[] = $p;
    }

    // Substitui vogais por caracteres especiais (exemplo comum de criptografia simples)
    $substituida = str_replace(['a','e','i','o','u'], ['@','3','1','0','u'], $letters_only);

    // Verifica prefixo e sufixo
    $starts_php = str_starts_with($letters_only, 'php');
    $ends_tica = substr($letters_only, -4) === 'tica';

    // Palíndromo: remove espaços e compara com a string invertida
    $sem_espaco = str_replace(' ', '', $letters_only);
    $palindromo = $sem_espaco === strrev($sem_espaco);

    // Verifica se a string contém apenas letras
    $apenas_letras = preg_match('/^[a-z\\s]+$/', $letters_only);

    // Exibição
    echo "<h2>Texto Analisado</h2><p>$texto</p>";
    echo "<p><strong>Vogais:</strong> $v | <strong>Consoantes:</strong> $c</p>";
    echo "<p><strong>Letra 'a':</strong> $a_count ocorrências</p>";
    echo "<h3>Palavras com mais de 5 letras:</h3><pre>"; print_r($longas); echo "</pre>";
    echo "<p><strong>Texto com substituições:</strong><br>$substituida</p>";
    echo "<p><strong>Começa com 'php'?</strong> " . ($starts_php ? 'Sim' : 'Não') . "</p>";
    echo "<p><strong>Termina com 'tica'?</strong> " . ($ends_tica ? 'Sim' : 'Não') . "</p>";
    echo "<p><strong>É palíndromo?</strong> " . ($palindromo ? 'Sim' : 'Não') . "</p>";
    echo "<p><strong>Contém apenas letras?</strong> " . ($apenas_letras ? 'Sim' : 'Não') . "</p>";
?>
