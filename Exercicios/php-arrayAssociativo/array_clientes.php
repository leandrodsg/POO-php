<?php
    // array_clientes.php

    // Lista de clientes com dados diversos para validação e análise
    $clientes = [
        ['nome' => 'Ana',    'email' => 'ana@email.com',     'cpf' => '12345678909', 'cidade' => 'São Paulo'],
        ['nome' => 'Bruno',  'email' => 'bruno@email.com',   'cpf' => '12345678909', 'cidade' => 'São Paulo'],
        ['nome' => 'Clara',  'email' => 'claraemail.com',    'cpf' => '98765432100', 'cidade' => 'Curitiba'],
        ['nome' => 'Diego',  'email' => '',                  'cpf' => '00011122233', 'cidade' => 'Curitiba'],
        ['nome' => 'Elisa',  'email' => 'elisa@email.com',   'cpf' => '',            'cidade' => 'Recife'],
    ];

    echo "<h1>Gestão de Clientes - Validação e Análise</h1>";

    // ---------------------------------------------------------
    // 1. Listar todos os clientes
    // ---------------------------------------------------------
    echo "<h3>1. Lista de clientes:</h3>";
    foreach ($clientes as $c) {
        echo "{$c['nome']} | {$c['email']} | CPF: {$c['cpf']} | Cidade: {$c['cidade']}<br>";
    }

    // ---------------------------------------------------------
    // 2. Validar e-mails com regex
    // ---------------------------------------------------------
    echo "<h3>2. E-mails válidos:</h3>";
    foreach ($clientes as $c) {
        if (preg_match("/^[^@\s]+@[^@\s]+\.[a-z]{2,}$/i", $c['email'])) {
            echo "{$c['nome']} → {$c['email']}<br>";
        }
    }

    // ---------------------------------------------------------
    // 3. Detectar CPFs duplicados
    // ---------------------------------------------------------
    echo "<h3>3. CPFs duplicados:</h3>";
    $cpfs = array_column($clientes, 'cpf');
    $duplicados = array_diff_assoc($cpfs, array_unique($cpfs));
    $duplicados = array_unique($duplicados);
    if ($duplicados) {
        foreach ($duplicados as $cpf) {
            echo "CPF duplicado encontrado: $cpf<br>";
        }
    } else {
        echo "Nenhum CPF duplicado.";
    }

    // ---------------------------------------------------------
    // 4. Filtrar registros incompletos (sem e-mail ou CPF)
    // ---------------------------------------------------------
    echo "<h3>4. Clientes com dados incompletos:</h3>";
    foreach ($clientes as $c) {
        if (empty($c['email']) || empty($c['cpf'])) {
            echo "{$c['nome']} está com dados incompletos.<br>";
        }
    }

    // ---------------------------------------------------------
    // 5. Agrupar clientes por cidade
    // ---------------------------------------------------------
    echo "<h3>5. Agrupamento por cidade:</h3>";
    $grupo = [];
    foreach ($clientes as $c) {
        $cidade = $c['cidade'];
        if (!isset($grupo[$cidade])) {
            $grupo[$cidade] = [];
        }
        $grupo[$cidade][] = $c['nome'];
    }
    foreach ($grupo as $cidade => $nomes) {
        echo "$cidade: " . implode(", ", $nomes) . "<br>";
    }

    // ---------------------------------------------------------
    // 6. Contagem por cidade (quantidade de clientes)
    // ---------------------------------------------------------
    echo "<h3>6. Total de clientes por cidade:</h3>";
    foreach ($grupo as $cidade => $lista) {
        echo "$cidade: " . count($lista) . " cliente(s)<br>";
    }
?>