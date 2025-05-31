<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Calculadora Básica</title>
</head>
<body>

  <h2>Calculadora em PHP</h2>

  <!--
    Formulário HTML que coleta dois números e a operação desejada.
    Os dados serão enviados para o arquivo calcular.php via método POST.
  -->
  <form action="calcular.php" method="post">

    <!-- Campo de entrada para o primeiro número -->
    <label for="num1">Número 1:</label>
    <input type="number" name="num1" required><br><br>

    <!-- Campo de entrada para o segundo número -->
    <label for="num2">Número 2:</label>
    <input type="number" name="num2" required><br><br>

    <!-- Menu suspenso com as opções de operação -->
    <label for="operacao">Operação:</label>
    <select name="operacao" required>
      <option value="soma">Soma</option>
      <option value="subtrai">Subtração</option>
      <option value="multiplica">Multiplicação</option>
      <option value="divide">Divisão</option>
    </select><br><br>

    <!-- Botão que envia o formulário -->
    <input type="submit" value="Calcular">

  </form>

</body>
</html>