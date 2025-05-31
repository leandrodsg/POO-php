<?php
    // array_associativo_basico.php

    // Verifica se o formulário foi enviado corretamente
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["array_input"])) {

        // Captura o conteúdo do formulário
        $entrada = $_POST["array_input"];

        // Converte a string enviada para um array associativo usando eval()
        // Importante: uso de eval só em ambiente controlado! Nunca em produção real.
        $array = [];
        eval("\$array = $entrada;");

        // Mostra o array recebido para referência
        echo "<h2>Array Recebido</h2>";
        echo "<pre>";
        print_r($array);
        echo "</pre>";

        // Mostra a quantidade de elementos no array (chaves existentes)
        echo "<h3>Total de campos:</h3>";
        echo count($array);

        // Lista todas as chaves presentes no array
        echo "<h3>Chaves disponíveis:</h3>";
        print_r(array_keys($array));

        // Lista todos os valores do array, separados das chaves
        echo "<h3>Valores armazenados:</h3>";
        print_r(array_values($array));

        // Verifica se a chave "idade" existe no array
        echo "<h3>Verificando se a chave 'idade' existe:</h3>";
        echo isset($array["idade"]) ? "Sim, existe." : "Não existe.";

        // Verifica se a chave "telefone" está vazia ou ausente
        echo "<h3>A chave 'telefone' está vazia?</h3>";
        echo empty($array["telefone"]) ? "Sim, está vazia ou não existe." : "Não está vazia.";

        // Percorre o array exibindo chave e valor com foreach
        echo "<h3>Exibindo chave e valor com foreach:</h3>";
        foreach ($array as $chave => $valor) {
            echo "$chave => $valor <br>";
        }

        // Exibe as chaves transformadas em maiúsculas (somente para visualização)
        echo "<h3>Chaves em maiúsculas (visual):</h3>";
        foreach ($array as $chave => $valor) {
            echo strtoupper($chave) . " => $valor <br>";
        }

        // Usa array_map para modificar os valores, adicionando um prefixo a cada um
        echo "<h3>Adicionando prefixo 'Dado:' a todos os valores:</h3>";
        $modificado = array_map(fn($v) => "Dado: $v", $array);
        print_r($modificado);
        
    } else {
        // Mensagem de retorno caso o formulário não tenha sido usado corretamente
        echo "<p>Volte para o <a href='index.php'>formulário inicial</a>.</p>";
    }
?>