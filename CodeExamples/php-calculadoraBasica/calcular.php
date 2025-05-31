<?php
    // Projeto 02: Calculadora Básica em PHP
    // Autor: Leandro
    // Objetivo: Executar uma das quatro operações básicas entre dois números

    // Verifica se o formulário foi enviado via método POST
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Converte os valores recebidos para tipo float (ponto flutuante)
        $num1 = floatval($_POST["num1"]);
        $num2 = floatval($_POST["num2"]);

        // Captura qual operação foi selecionada
        $operacao = $_POST["operacao"];

        // Inicializa as variáveis que serão usadas
        $resultado = 0;
        $erro = "";

        // Define o comportamento com base na operação escolhida
        switch ($operacao) {
            case "soma":
                $resultado = $num1 + $num2;
                break;
            case "subtrai":
                $resultado = $num1 - $num2;
                break;
            case "multiplica":
                $resultado = $num1 * $num2;
                break;
            case "divide":
                // Verifica se o segundo número é diferente de zero antes de dividir
                if ($num2 != 0) {
                    $resultado = $num1 / $num2;
                } else {
                    // Atribui mensagem de erro se tentativa de divisão por zero
                    $erro = "Erro: divisão por zero!";
                }
                break;
            default:
                // Caso a operação não seja reconhecida
                $erro = "Operação inválida.";
        }

        // Exibe o resultado na tela
        echo "<h2>Resultado:</h2>";
        if ($erro) {
            // Se houve erro, exibe mensagem em vermelho
            echo "<p style='color:red;'>$erro</p>";
        } else {
            // Exibe o cálculo com os números e o resultado
            echo "<p><strong>Resultado: $resultado</strong></p>";
        }

        // Link para voltar ao formulário
        echo '<p><a href="index.php">Voltar</a></p>';
    } else {
        // Se a pessoa tentar acessar o arquivo diretamente, redireciona para o formulário
        header("Location: index.php");
        exit();
    }
?>