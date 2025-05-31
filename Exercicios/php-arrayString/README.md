# Projeto: Manipulação de Strings em PHP

Este projeto demonstra diversas operações úteis com strings em PHP, organizadas em categorias:

## Estrutura

- `index.php`: Formulário principal com acesso às análises
- `array_string_basico.php`: Trim, strlen, caixa, substring
- `array_string_palavras.php`: explode, contagem, substituição, palavras únicas
- `array_string_avancado.php`: validações, regex, prefixo/sufixo, leet, palíndromo
- `array_high_order_strings.php`: array_map, array_filter e array_reduce com strings

## Funcionalidades

### Básico
- Remoção de espaços (`trim`)
- Comprimento (`strlen`)
- Maiúsculas / Minúsculas
- Substrings

### Frases
- Contagem de palavras
- Substituição de palavras (`str_ireplace`)
- Palavras únicas

### Avançado
- Contagem de vogais/consoantes
- Verificação de letras e palavras longas
- Substituição estilo leet
- Verificação de prefixo/sufixo
- Palíndromo
- Expressões regulares

### Alta Ordem
- `array_map`: Ex: transformar nomes
- `array_filter`: Ex: selecionar nomes com condição
- `array_reduce`: Ex: concatenar resultados

## Observação

Também existe uma versão CLI com algoritmos manuais, sem funções nativas.

---

## English Version

# Project: String Manipulation in PHP

This project explores different string operations in PHP, structured by category.

## Structure

- `index.php`: Main form to test each analysis
- `array_string_basico.php`: Trimming, casing, length, substring
- `array_string_palavras.php`: Word count, replace, explode, unique
- `array_string_avancado.php`: Validations, regex, prefix/suffix, leet, palindrome
- `array_high_order_strings.php`: High-order functions with strings

## Features

### Basic
- Trim, length, case transformation, substring

### Phrases
- Word count, case-insensitive replacement, unique words

### Advanced
- Vowel/consonant count, word length filter
- Leet-style replacement
- Prefix/suffix checks
- Palindrome validation
- Regex validation

### High-Order Functions
- `array_map`: Case transformation
- `array_filter`: Conditional filtering
- `array_reduce`: Join/concatenate

## Note

A CLI version with manual algorithm implementation is also available.