<?php
    // array_associativo_palavras.php

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["array_input"])) {
        $entrada = $_POST["array_input"];
        $array = [];
        eval("\$array = $entrada;");

        echo "<h2>Array Recebido</h2><pre>";
        print_r($array);
        echo "</pre>";

        // Verifica quais chaves contêm a letra "i"
        echo "<h3>Chaves que contêm a letra 'i':</h3>";
        foreach ($array as $chave => $valor) {
            if (strpos($chave, 'i') !== false) {
                echo "A chave '$chave' contém a letra 'i'<br>";
            }
        }

        // Mostra os valores com mais de 10 caracteres
        echo "<h3>Valores com mais de 10 caracteres:</h3>";
        foreach ($array as $chave => $valor) {
            if (is_string($valor) && strlen($valor) > 10) {
                echo "$chave: $valor<br>";
            }
        }

        // Substitui a palavra "Carlos" por "Usuário" nos valores
        echo "<h3>Substituindo 'Carlos' por 'Usuário' nos valores:</h3>";
        $substituido = array_map(function ($valor) {
            return str_ireplace("Carlos", "Usuário", $valor);
        }, $array);
        print_r($substituido);

        // Separa os valores por palavras (explode) e conta quantas tem
        echo "<h3>Separando os valores em palavras:</h3>";
        foreach ($array as $chave => $valor) {
            if (is_string($valor)) {
                $palavras = explode(" ", $valor);
                echo "[$chave] tem " . count($palavras) . " palavra(s): ";
                print_r($palavras);
                echo "<br>";
            }
        }

        // Remove valores duplicados
        echo "<h3>Removendo valores duplicados:</h3>";
        $valoresUnicos = array_unique($array);
        print_r($valoresUnicos);
        
    } else {
        echo "<p>Volte para o <a href='index.php'>formulário inicial</a>.</p>";
    }
?>