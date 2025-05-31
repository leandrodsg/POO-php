<?php
    // produtos_cli.php

    // Lista de produtos (sem usar métodos prontos)
    $produtos = [
        ["nome" => "Caneta", "preco" => 2.5, "quantidade" => 10],
        ["nome" => "Caderno", "preco" => 15.0, "quantidade" => 5],
        ["nome" => "Borracha", "preco" => 1.2, "quantidade" => 20]
    ];

    echo "Análise de Estoque (modo CLI)\n\n";

    // 1. Valor total do estoque (preço * quantidade)
    $total = 0;
    for ($i = 0; $i < count($produtos); $i++) {
        $subtotal = $produtos[$i]["preco"] * $produtos[$i]["quantidade"];
        $total += $subtotal;
    }
    echo "1. Valor total do estoque: R$ $total\n\n";

    // 2. Produto com menor quantidade (baixo estoque)
    echo "2. Produtos com quantidade < 10:\n";
    for ($i = 0; $i < count($produtos); $i++) {
        if ($produtos[$i]["quantidade"] < 10) {
            echo "- " . $produtos[$i]["nome"] . " (Qtd: " . $produtos[$i]["quantidade"] . ")\n";
        }
    }
    echo "\n";

    // 3. Produto mais caro
    $maisCaro = $produtos[0];
    for ($i = 1; $i < count($produtos); $i++) {
        if ($produtos[$i]["preco"] > $maisCaro["preco"]) {
            $maisCaro = $produtos[$i];
        }
    }
    echo "3. Produto mais caro: " . $maisCaro["nome"] . " (R$ " . $maisCaro["preco"] . ")\n";