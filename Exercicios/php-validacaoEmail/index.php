<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Validação de E-mail</title>
</head>
<body>

  <h2>Validação de E-mail com PHP</h2>

  <!--
    Formulário simples que envia um e-mail para validação.
    O método POST envia os dados ao arquivo validar.php.
  -->
  <form action="validar.php" method="post">
    <label for="email">Digite seu e-mail:</label>
    <input type="email" name="email" required><br><br>

    <input type="submit" value="Validar E-mail">
  </form>

</body>
</html>
