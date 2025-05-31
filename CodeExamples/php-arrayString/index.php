<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exploração de Strings em PHP</title>
</head>
<body>
    <h1>Operações com Strings em PHP</h1>
    <p>Escolha um tipo de análise:</p>

    <!-- Básico -->
    <h2>1. Operações Básicas</h2>
    <form action="array_string_basico.php" method="post">
        <input type="text" name="texto" size="80" value=" Olá Mundo!   " required><br>
        <input type="submit" value="Executar Básico">
    </form>

    <!-- Palavras -->
    <h2>2. Análise de Frases</h2>
    <form action="array_string_palavras.php" method="post">
        <input type="text" name="frase" size="80"
               value="Hoje é um belo dia para estudar PHP, PHP é legal!" required><br>
        <input type="submit" value="Executar Frases">
    </form>

    <!-- Avançado -->
    <h2>3. Validações Avançadas</h2>
    <form action="array_string_avancado.php" method="post">
        <input type="text" name="texto" size="80"
               value="A linguagem PHP é poderosa, mas exige prática." required><br>
        <input type="submit" value="Executar Avançado">
    </form>

    <!-- Alta Ordem -->
    <h2>4. Funções de Alta Ordem com Strings</h2>
    <form action="array_high_order_strings.php" method="post">
        <p>Este exemplo usa um array de nomes como base.</p>
        <input type="submit" value="Executar array_map / filter / reduce">
    </form>
</body>
</html>