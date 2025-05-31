<?php
    // associativo_avancado_cli.php

    // Objetivo: recriar operações avançadas apenas com lógica manual
    // Palíndromos, busca de padrões, contagem de frequências, duplicatas...

    $dados = [
        "palavra1" => "radar",
        "email" => "ana@email.com",
        "cpf" => "12345678909",
        "frase" => "PHP é legal",
        "repetido1" => "banana",
        "repetido2" => "banana"
    ];

    echo "Análise Avançada de Array Associativo\n\n";

    // ---------------------------------------------------------
    // 1. Detectar palíndromos (sem strrev, sem preg_replace)
    // ---------------------------------------------------------
    echo "1. Verificação de palíndromos:\n";
    foreach ($dados as $chave => $valor) {
        $limpo = "";
        // Remove caracteres não alfabéticos e converte para minúsculas
        for ($i = 0; $i < strlen($valor); $i++) {
            $char = strtolower($valor[$i]);
            $ascii = ord($char);
            if ($ascii >= 97 && $ascii <= 122) {
                $limpo .= $char;
            }
        }

        // Compara do início ao fim
        $ehPalindromo = true;
        $n = strlen($limpo);
        for ($i = 0; $i < $n / 2; $i++) {
            if ($limpo[$i] !== $limpo[$n - 1 - $i]) {
                $ehPalindromo = false;
                break;
            }
        }

        if ($limpo !== "" && $ehPalindromo) {
            echo "- [$chave] é palíndromo: $valor\n";
        }
    }
    echo "\n";

    // ---------------------------------------------------------
    // 2. Identificar valores que parecem e-mail (sem regex)
    // ---------------------------------------------------------
    echo "2. Detecção de e-mail (simples):\n";
    foreach ($dados as $chave => $valor) {
        $temArroba = false;
        $temPonto = false;

        for ($i = 0; $i < strlen($valor); $i++) {
            if ($valor[$i] === '@') $temArroba = true;
            if ($valor[$i] === '.') $temPonto = true;
        }

        if ($temArroba && $temPonto) {
            echo "- [$chave] parece um e-mail: $valor\n";
        }
    }
    echo "\n";

    // ---------------------------------------------------------
    // 3. Detectar valores duplicados (sem array_unique)
    // ---------------------------------------------------------
    echo "3. Detecção de duplicatas:\n";
    $valores = [];
    foreach ($dados as $chave => $valor) {
        $repetido = false;
        foreach ($valores as $v) {
            if ($v === $valor) {
                $repetido = true;
                break;
            }
        }
        if ($repetido) {
            echo "- Valor duplicado: $valor\n";
        } else {
            $valores[] = $valor;
        }
    }
    echo "\n";

    // ---------------------------------------------------------
    // 4. Contar frequência dos valores (simula array_count_values)
    // ---------------------------------------------------------
    echo "4. Frequência de cada valor:\n";
    $frequencia = [];

    foreach ($dados as $chave => $valor) {
        $existe = false;
        for ($i = 0; $i < count($frequencia); $i++) {
            if ($frequencia[$i]['valor'] === $valor) {
                $frequencia[$i]['qtd']++;
                $existe = true;
                break;
            }
        }
        if (!$existe) {
            $frequencia[] = ["valor" => $valor, "qtd" => 1];
        }
    }

    foreach ($frequencia as $item) {
        echo "- '{$item['valor']}' apareceu {$item['qtd']}x\n";
    }
    echo "\n";

    // ---------------------------------------------------------
    // 5. Exibir chaves com prefixo "rep" (sem str_starts_with)
    // ---------------------------------------------------------
    echo "5. Chaves que começam com 'rep':\n";
    foreach ($dados as $chave => $valor) {
        if (strlen($chave) >= 3 &&
            $chave[0] === 'r' &&
            $chave[1] === 'e' &&
            $chave[2] === 'p') {
            echo "- $chave\n";
        }
    }