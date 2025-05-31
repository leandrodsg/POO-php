# Projeto 02 – Calculadora Básica em PHP

Este projeto é um exemplo simples, porém completo, de uma calculadora feita com PHP e HTML. Ele foi criado como parte da preparação para provas e também como conteúdo de portfólio. A aplicação permite que o usuário escolha dois números, selecione uma operação (soma, subtração, multiplicação ou divisão) e visualize o resultado da operação.

## Estrutura dos arquivos

- `index.php`: Contém o formulário HTML com campos para inserir números e escolher a operação.
- `calcular.php`: Processa os dados enviados via POST, executa a operação e retorna o resultado.
- `.gitignore`: Arquivo padrão para evitar versionamento de pastas desnecessárias.
- `README.md`: Este arquivo com explicações, instruções e conceitos envolvidos.

## Conceitos abordados

- `echo`: Usado para exibir informações na tela.
- `$_POST`: Superglobal que captura dados enviados por formulários.
- `floatval()`: Converte o valor recebido para número decimal.
- `switch`: Estrutura de controle para múltiplas condições.
- `header("Location: ...")`: Redirecionamento em PHP.
- Tratamento de erros (ex: divisão por zero).
- Separação entre lógica e visual: o PHP que processa está em `calcular.php`, separado da interface `index.php`.


## English version:
# Project 02 – Basic Calculator in PHP

This project is a simple yet complete example of a calculator built with PHP and HTML. It was created as part of exam preparation and also serves as a portfolio piece. The application allows the user to input two numbers, select an operation (addition, subtraction, multiplication, or division), and see the result.

## File Structure

- `index.php`: Contains the HTML form with fields to enter numbers and choose the operation.
- `calcular.php`: Processes the data sent via POST, performs the operation, and returns the result.
- `.gitignore`: Standard file to prevent versioning of unnecessary folders.
- `README.md`: This file with explanations, instructions, and involved concepts.

## Covered Concepts

- `echo`: Used to display information on the screen.
- `$_POST`: Superglobal that captures data sent by forms.
- `floatval()`: Converts the received value to a decimal number.
- `switch`: Control structure for multiple conditions.
- `header("Location: ...")`: Redirection in PHP.
- Error handling (e.g., division by zero).
- Separation between logic and visual: the PHP logic is in `calcular.php`, separated from the interface in `index.php`.