# Projeto PHP: Manipulação de Arrays Associativos

Este repositório apresenta uma coleção didática e prática de scripts PHP organizados para demonstrar testes técnicos relacionados a arrays associativos e manipulação de dados em PHP puro.

---

## Objetivo

- Sintaxe e estrutura de arrays associativos
- Operações básicas, intermediárias e avançadas
- Validações, ordenações, filtros e agrupamentos
- Casos reais simulando contextos de sistemas

---

## Estrutura do Projeto

- `index.php`
  - Interface central com formulários e exemplos prontos para cada tipo de operação.
  - Serve como ponto de partida para explorar todos os arquivos abaixo.

- `array_associativo_basico.php`
  - Operações fundamentais com arrays associativos: `count`, `array_keys`, `foreach`, `isset`, `empty`, `array_map`.

- `array_associativo_palavras.php`
  - Manipulação de strings nos valores dos arrays: `explode`, `str_ireplace`, contagem de palavras, remoção de duplicatas.

- `array_associativo_avancado.php`
  - Casos clássicos de entrevista:
    - Regex com `preg_match`
    - Palíndromos com `strrev`
    - Duplicatas
    - `array_count_values`
    - Verificação de tipos e estrutura

- `array_produtos.php`
  - Simulação de sistema de estoque:
    - Cálculo de valor total
    - Filtros por quantidade
    - Produto mais caro
    - Agrupamento por nome

- `array_alunos.php`
  - Sistema de avaliação escolar:
    - Cálculo de média
    - Aprovação e reprovação
    - Ordenação por nota
    - Aluno com maior/menor desempenho

- `array_clientes.php`
  - Validação e análise de cadastros:
    - Verificação de e-mail e CPF
    - Agrupamento por cidade
    - Filtros por campos incompletos
    - Detecção de duplicatas

- `array_tarefas.php`
  - Gestão de tarefas (checklist):
    - Filtro por status (pendente, feito)
    - Contagem por status
    - Busca por palavra-chave
    - Agrupamento por prioridade

- `array_eventos.php`
  - Agenda de eventos:
    - Classificação por data (hoje, passado, futuro)
    - Validação de formato
    - Agrupamento por mês
    - Ordenação por data

---

## Recursos Abordados

- `array_keys`, `array_values`, `count`, `array_map`
- `isset`, `empty`, `foreach`, `explode`, `str_ireplace`
- `array_unique`, `array_column`, `array_filter`
- `ksort`, `usort`, `str_word_count`, `preg_match`
- `strrev`, `is_numeric`, `strtotime`, `date`
- Agrupamento manual, frequência, duplicatas