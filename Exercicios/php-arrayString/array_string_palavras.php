<?php
    // =============================================================
    // Análise de frases com foco em palavras
    // =============================================================

    $frase = $_POST['frase'] ?? '';

    // Remove pontuação da frase
    $limpa = preg_replace('/[.,!?]/', '', $frase);

    // Conta as palavras usando função nativa
    $contagem = str_word_count($limpa);

    // Substitui todas as ocorrências de "php" (case insensitive) por destaque
    $sub = str_ireplace('php', '<strong>PHP</strong>', $frase);

    // Transforma a frase em palavras minúsculas e únicas
    $palavras = explode(' ', strtolower($limpa));
    $unicas = array_unique($palavras);

    // Exibição dos resultados
    echo "<h2>Frase:</h2><p>$frase</p>";
    echo "<p><strong>Total de palavras:</strong> $contagem</p>";
    echo "<p><strong>Com destaque:</strong> $sub</p>";
    echo "<h3>Palavras únicas:</h3><pre>";
    print_r($unicas);
    echo "</pre>";
?>
