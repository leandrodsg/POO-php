<?php
    // =============================================================
    // Operações de Alta Ordem com array de strings (map, filter, reduce)
    // =============================================================

    // Array base de nomes
    $nomes = ['Ana', 'maria', 'Pedro', 'paulo', 'Rita', 'ana', 'João'];

    // Exibe o array original
    echo "<h2>Array Original</h2><pre>";
    print_r($nomes);
    echo "</pre>";

    // 1. MAP: colocar todos os nomes em maiúsculas
    $maiusculas = array_map('strtoupper', $nomes);
    echo "<h3>array_map → Nomes em maiúsculas</h3><pre>";
    print_r($maiusculas);
    echo "</pre>";

    // 2. FILTER: nomes que começam com 'p' ou 'P'
    $com_p = array_filter($nomes, function($nome) {
        return strtolower($nome[0]) === 'p';
    });
    echo "<h3>array_filter → Nomes que começam com 'p'</h3><pre>";
    print_r($com_p);
    echo "</pre>";

    // 3. REDUCE: concatenar nomes com vírgula
    $lista = array_reduce($nomes, function($acc, $nome) {
        return $acc === '' ? $nome : $acc . ', ' . $nome;
    }, '');
    echo "<h3>array_reduce → Lista concatenada</h3><p>$lista</p>";
?>