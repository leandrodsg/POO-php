<?php
    // associativo_basico_cli.php

    // Objetivo: Reproduzir as operações básicas de arrays associativos sem usar funções prontas

    // Criamos um array associativo manualmente
    $usuario = [
        "nome" => "Carlos",
        "idade" => 30,
        "email" => "carlos@email.com",
        "cidade" => "São Paulo"
    ];

    // 1. Contar o número de elementos (sem usar count())
    echo "1. Contando elementos:\n";
    $contador = 0;
    foreach ($usuario as $chave => $valor) {
        $contador++; // incrementa 1 a cada elemento
    }
    echo "Total de campos: $contador\n\n";

    // 2. Imprimir todas as chaves
    echo "2. Chaves do array:\n";
    foreach ($usuario as $chave => $valor) {
        echo "$chave\n";
    }
    echo "\n";

    // 3. Imprimir todos os valores
    echo "3. Valores do array:\n";
    foreach ($usuario as $chave => $valor) {
        echo "$valor\n";
    }
    echo "\n";

    // 4. Verificar se a chave "idade" existe (sem usar isset())
    echo "4. A chave 'idade' existe?\n";
    $existe = false;
    foreach ($usuario as $chave => $valor) {
        if ($chave === "idade") {
            $existe = true;
            break;
        }
    }
    echo $existe ? "Sim\n\n" : "Não\n\n";

    // 5. Imprimir chave e valor com explicação
    echo "5. Todos os dados (chave => valor):\n";
    foreach ($usuario as $chave => $valor) {
        echo "$chave => $valor\n";
    }
    echo "\n";

    // 6. Exibir as chaves em maiúscula sem usar strtoupper()
    echo "6. Chaves em maiúscula (manual):\n";
    foreach ($usuario as $chave => $valor) {
        $maiuscula = '';
        for ($i = 0; $i < strlen($chave); $i++) {
            $letra = $chave[$i];
            $ascii = ord($letra);
            // converte minúscula para maiúscula
            if ($ascii >= 97 && $ascii <= 122) {
                $ascii -= 32;
            }
            $maiuscula .= chr($ascii);
        }
        echo "$maiuscula => $valor\n";
    }
    echo "\n";

    // 7. Simular array_map: adicionar ">>" antes dos valores
    echo "7. Adicionando prefixo manual aos valores:\n";
    foreach ($usuario as $chave => $valor) {
        echo "$chave => >> $valor\n";
    }
