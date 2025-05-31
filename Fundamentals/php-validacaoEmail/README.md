# Projeto 03 – Validação de E-mail com PHP

Este projeto tem como objetivo validar o formato de um e-mail enviado por um formulário HTML. Ele utiliza a função `filter_var()` com a flag `FILTER_VALIDATE_EMAIL`.

## Estrutura dos arquivos

- `index.php`: Contém o formulário HTML com o campo de entrada.
- `validar.php`: Arquivo que processa e valida o e-mail usando `filter_var`.
- `.gitignore`: Ignora arquivos desnecessários no versionamento.
- `README.md`: Explicação do projeto e seus conceitos.

## Conceitos abordados

- `filter_var()`: Função poderosa para validação e filtragem de dados.
- `FILTER_VALIDATE_EMAIL`: Validador padrão de e-mails no PHP.
- `$_POST`: Captura segura dos dados enviados pelo formulário.
- `header("Location: ...")`: Redirecionamento para evitar acessos diretos.

# Project 03 – Email Validation with PHP

This project aims to validate the format of an email submitted through an HTML form. It uses the `filter_var()` function with the `FILTER_VALIDATE_EMAIL` flag.

## File Structure

- `index.php`: Contains the HTML form with the email input field.
- `validar.php`: The file that processes and validates the email using `filter_var`.
- `.gitignore`: Ignores unnecessary files from being versioned.
- `README.md`: Project explanation and covered concepts.

## Key Concepts

- `filter_var()`: Powerful function for validating and filtering data.
- `FILTER_VALIDATE_EMAIL`: Standard email validator in PHP.
- `$_POST`: Securely captures data submitted through the form.
- `header("Location: ...")`: Redirects to prevent direct file access.