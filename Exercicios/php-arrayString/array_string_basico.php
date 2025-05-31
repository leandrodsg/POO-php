<?php
    // =============================================================
    // Operações básicas com uma string
    // =============================================================

    // Captura a string enviada via POST
    $texto = $_POST['texto'] ?? '';

    // Remove espaços desnecessários nas bordas
    $trim = trim($texto);

    // Exibe a string original e processada
    echo "<h2>Original:</h2><p>[$texto]</p>";
    echo "<p><strong>Trim:</strong> [$trim]</p>";

    // Tamanho da string
    echo "<p><strong>Comprimento:</strong> " . strlen($trim) . " caracteres</p>";

    // Converte para caixa alta e baixa
    echo "<p><strong>Maiúsculas:</strong> " . strtoupper($trim) . "</p>";
    echo "<p><strong>Minúsculas:</strong> " . strtolower($trim) . "</p>";

    // Mostra parte da string (substring do início aos 3 primeiros)
    echo "<p><strong>Substring (0-3):</strong> " . substr($trim, 0, 3) . "</p>";
?>