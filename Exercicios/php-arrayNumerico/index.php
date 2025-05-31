<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exploração de Arrays Numéricos em PHP</title>
</head>
<body>
    <h1>Operações com Arrays Numéricos</h1>
    <p>Escolha uma das categorias abaixo para testar os tipos de arrays:</p>

    <!-- Inteiros -->
    <h2>1. Array de Números Inteiros</h2>
    <form action="array_numerico_int.php" method="post">
        <label>Digite números inteiros separados por vírgula:</label><br>
        <input type="text" name="numeros" size="80"
               value="-5,0,3,-2,6,9,3,-5,12" required><br>
        <input type="submit" value="Executar Inteiros">
    </form>

    <!-- Floats -->
    <h2>2. Array de Números Decimais (floats)</h2>
    <form action="array_numerico_float.php" method="post">
        <label>Digite números decimais separados por vírgula:</label><br>
        <input type="text" name="numeros" size="80"
               value="-1.5,3.2,0.0,4.8,-2.3,3.0,6.6,3.0" required><br>
        <input type="submit" value="Executar Decimais">
    </form>

    <!-- Misto -->
    <h2>3. Array Misto (int + float)</h2>
    <form action="array_numerico_misto.php" method="post">
        <label>Digite números mistos separados por vírgula:</label><br>
        <input type="text" name="numeros" size="80"
               value="1,-2.5,3.0,0,-4,6.6,7,3.0,-1" required><br>
        <input type="submit" value="Executar Misto">
    </form>

    <!-- Alta Ordem -->
    <h2>4. Operações com Funções de Alta Ordem</h2>
    <form action="array_high_order_html.php" method="post">
        <p>Este exemplo não requer entrada — os dados estão embutidos no script.</p>
        <input type="submit" value="Executar array_filter / map / reduce">
    </form>
</body>
</html>