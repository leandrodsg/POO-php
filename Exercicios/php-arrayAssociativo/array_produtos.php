<?php
    // array_produtos.php

    // Simulamos uma entrada direta (poderia vir do formulário também)
    $produtos = [
        ['id'=>1, 'nome'=>'Caneta',  'preco'=>2.50,  'quantidade'=>10],
        ['id'=>2, 'nome'=>'Caderno', 'preco'=>15.00, 'quantidade'=>5],
        ['id'=>3, 'nome'=>'Borracha','preco'=>1.20,  'quantidade'=>20],
        ['id'=>4, 'nome'=>'Lápis',   'preco'=>1.00,  'quantidade'=>2],
        ['id'=>5, 'nome'=>'Caneta',  'preco'=>2.50,  'quantidade'=>10], // produto repetido
    ];

    echo "<h1>Gestão de Estoque - Análise de Produtos</h1>";

    // ---------------------------------------------------------
    // 1. Exibir todos os produtos de forma legível
    // ---------------------------------------------------------
    echo "<h3>1. Lista de Produtos:</h3>";
    foreach ($produtos as $p) {
        echo "ID {$p['id']} | {$p['nome']} - R$ {$p['preco']} x {$p['quantidade']} unidades<br>";
    }

    // ---------------------------------------------------------
    // 2. Calcular o valor total do estoque (preço * quantidade)
    // ---------------------------------------------------------
    $valorTotal = 0;
    foreach ($produtos as $p) {
        $valorTotal += $p['preco'] * $p['quantidade'];
    }
    echo "<h3>2. Valor total em estoque: R$ " . number_format($valorTotal, 2, ',', '.') . "</h3>";

    // ---------------------------------------------------------
    // 3. Filtrar produtos com estoque baixo (< 5 unidades)
    // ---------------------------------------------------------
    echo "<h3>3. Produtos com estoque baixo (menos de 5 unidades):</h3>";
    foreach ($produtos as $p) {
        if ($p['quantidade'] < 5) {
            echo "- {$p['nome']} (Qtd: {$p['quantidade']})<br>";
        }
    }

    // ---------------------------------------------------------
    // 4. Encontrar o produto mais caro
    // ---------------------------------------------------------
    $maisCaro = $produtos[0];
    foreach ($produtos as $p) {
        if ($p['preco'] > $maisCaro['preco']) {
            $maisCaro = $p;
        }
    }
    echo "<h3>4. Produto mais caro:</h3>";
    echo "{$maisCaro['nome']} - R$ {$maisCaro['preco']}<br>";

    // ---------------------------------------------------------
    // 5. Ordenar produtos por preço (do mais barato ao mais caro)
    // ---------------------------------------------------------
    usort($produtos, function($a, $b) {
        return $a['preco'] <=> $b['preco'];
    });
    echo "<h3>5. Produtos ordenados por preço:</h3>";
    foreach ($produtos as $p) {
        echo "{$p['nome']} - R$ {$p['preco']}<br>";
    }

    // ---------------------------------------------------------
    // 6. Criar uma lista com nomes dos produtos (sem repetição)
    // ---------------------------------------------------------
    $nomes = array_unique(array_column($produtos, 'nome'));
    echo "<h3>6. Nomes únicos de produtos:</h3>";
    print_r($nomes);

    // ---------------------------------------------------------
    // 7. Calcular total individual por produto
    // ---------------------------------------------------------
    echo "<h3>7. Total em estoque por produto (preço * qtd):</h3>";
    foreach ($produtos as $p) {
        $total = $p['preco'] * $p['quantidade'];
        echo "{$p['nome']} → R$ " . number_format($total, 2, ',', '.') . "<br>";
    }

    // ---------------------------------------------------------
    // 8. Agrupar produtos pelo nome e somar quantidade
    // ---------------------------------------------------------
    echo "<h3>8. Quantidade total agrupada por nome:</h3>";
    $agrupado = [];
    foreach ($produtos as $p) {
        $nome = $p['nome'];
        if (!isset($agrupado[$nome])) {
            $agrupado[$nome] = 0;
        }
        $agrupado[$nome] += $p['quantidade'];
    }
    foreach ($agrupado as $nome => $qtd) {
        echo "$nome: $qtd unidades<br>";
    }
?>