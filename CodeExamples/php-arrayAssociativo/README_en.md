# PHP Project: Manipulating Associative Arrays

This repository presents a practical and educational collection of PHP scripts designed to demonstrate technical tests related to associative arrays and pure PHP data manipulation.

---

## Objective

- Syntax and structure of associative arrays
- Basic, intermediate, and advanced operations
- Validations, sorting, filtering, and grouping
- Real-world use cases simulating system contexts

---

## Project Structure

- `index.php`
  - Central interface with ready-to-use forms and examples for each type of operation.
  - Serves as the starting point to explore all the scripts below.

- `array_associativo_basico.php`
  - Fundamental operations with associative arrays: `count`, `array_keys`, `foreach`, `isset`, `empty`, `array_map`.

- `array_associativo_palavras.php`
  - String manipulation within array values: `explode`, `str_ireplace`, word counting, removing duplicates.

- `array_associativo_avancado.php`
  - Common interview scenarios:
    - Regex with `preg_match`
    - Palindromes with `strrev`
    - Duplicates
    - `array_count_values`
    - Type checking and structural logic

- `array_produtos.php`
  - Stock management simulation:
    - Total value calculation
    - Quantity filtering
    - Finding the most expensive product
    - Grouping by product name

- `array_alunos.php`
  - Student grading system:
    - Average grade calculation
    - Pass/fail status
    - Sorting by grades
    - Highest/lowest performance

- `array_clientes.php`
  - Customer data validation and analysis:
    - Email and CPF verification
    - Grouping by city
    - Filtering incomplete data
    - Detecting duplicates

- `array_tarefas.php`
  - Task management (checklist):
    - Filter by status (pending, done)
    - Status count
    - Keyword search
    - Grouping by priority

- `array_eventos.php`
  - Event scheduling:
    - Date classification (past, today, future)
    - Format validation
    - Monthly grouping
    - Date sorting

---

## Covered Concepts

- `array_keys`, `array_values`, `count`, `array_map`
- `isset`, `empty`, `foreach`, `explode`, `str_ireplace`
- `array_unique`, `array_column`, `array_filter`
- `ksort`, `usort`, `str_word_count`, `preg_match`
- `strrev`, `is_numeric`, `strtotime`, `date`
- Manual grouping, frequency counting, duplicates detection