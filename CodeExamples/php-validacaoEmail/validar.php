<?php
// Projeto 03: Validação de E-mail com Comentários Explicativos
// Autor: Leandro
// Objetivo: Verificar se um e-mail digitado é válido utilizando filter_var()

// Verifica se o formulário foi enviado usando o método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Captura o valor enviado pelo campo "email" do formulário
    $email = $_POST["email"];

    /*
        Aqui usamos a função filter_var() com o filtro FILTER_VALIDATE_EMAIL.

        filter_var() aplica um filtro de validação ou sanitização em uma variável.
        Neste caso, estamos validando se o valor da variável $email tem o formato de um e-mail válido.

        - Se for válido, a função retorna o próprio e-mail.
        - Se for inválido, a função retorna false.
    */
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Caso o e-mail seja válido, exibimos uma mensagem de sucesso em verde
        echo "<p style='color:green;'>E-mail válido: $email</p>";
    } else {
        // Caso contrário, exibimos uma mensagem de erro em vermelho
        echo "<p style='color:red;'>E-mail inválido! Tente novamente.</p>";
    }

    // Link para o usuário voltar à página do formulário
    echo '<p><a href="index.php">Voltar</a></p>';

} else {
    // Se o arquivo for acessado diretamente (sem POST), redireciona para o formulário
    header("Location: index.php");
    exit();
}
?>
