<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>PHP - Manipulação de Arrays Associativos</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        h1 { color: #333; }
        section { margin-bottom: 40px; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
        textarea { width: 100%; height: 150px; font-family: monospace; }
        input[type="submit"] { padding: 10px 20px; }
        .destino { margin-bottom: 10px; font-size: 0.9em; color: #666; }
    </style>
</head>
<body>

    <h1>PHP - Central de Manipulação de Arrays Associativos</h1>
    <p>Escolha uma operação e envie o array associativo de exemplo:</p>

    <!-- BLOCO 1: Operações Básicas -->
    <section>
        <h2>🧩 Operações Básicas</h2>
        <div class="destino">Arquivo: <code>array_associativo_basico.php</code></div>
        <form method="POST" action="array_associativo_basico.php">
            <textarea name="array_input">[
    "nome" => "Carlos",
    "idade" => 30,
    "profissao" => "Analista",
    "email" => "carlos@email.com"
]</textarea>
            <br><input type="submit" value="Testar Operações Básicas">
        </form>
    </section>

    <!-- BLOCO 2: Palavras e String -->
    <section>
        <h2>🔤 Operações com Palavras</h2>
        <div class="destino">Arquivo: <code>array_associativo_palavras.php</code></div>
        <form method="POST" action="array_associativo_palavras.php">
            <textarea name="array_input">[
    "frase1" => "PHP é muito legal",
    "frase2" => "Carlos é desenvolvedor PHP",
    "nome" => "Carlos"
]</textarea>
            <br><input type="submit" value="Testar Análise de Palavras">
        </form>
    </section>

    <!-- BLOCO 3: Operações Avançadas -->
    <section>
        <h2>🧠 Operações Avançadas (Regex, Palíndromos, Duplicatas)</h2>
        <div class="destino">Arquivo: <code>array_associativo_avancado.php</code></div>
        <form method="POST" action="array_associativo_avancado.php">
            <textarea name="array_input">[
    "email" => "ana@email.com",
    "palavra" => "radar",
    "cpf" => "12345678909",
    "duplicado" => "repetido",
    "outra" => "repetido"
]</textarea>
            <br><input type="submit" value="Testar Operações Avançadas">
        </form>
    </section>

    <!-- BLOCO 4: Produtos (Estoque) -->
    <section>
        <h2>🛒 Estoque de Produtos</h2>
        <div class="destino">Arquivo: <code>array_produtos.php</code></div>
        <form method="POST" action="array_produtos.php">
            <p><i>Este arquivo usa dados internos e não precisa de entrada.</i></p>
            <input type="submit" value="Visualizar Análise de Produtos">
        </form>
    </section>

    <!-- BLOCO 5: Alunos -->
    <section>
        <h2>🎓 Notas de Alunos</h2>
        <div class="destino">Arquivo: <code>array_alunos.php</code></div>
        <form method="POST" action="array_alunos.php">
            <p><i>Este arquivo usa dados internos e não precisa de entrada.</i></p>
            <input type="submit" value="Visualizar Desempenho de Alunos">
        </form>
    </section>

    <!-- BLOCO 6: Clientes -->
    <section>
        <h2>👤 Validação de Clientes</h2>
        <div class="destino">Arquivo: <code>array_clientes.php</code></div>
        <form method="POST" action="array_clientes.php">
            <p><i>Este arquivo usa dados internos e não precisa de entrada.</i></p>
            <input type="submit" value="Visualizar Cadastro de Clientes">
        </form>
    </section>

    <!-- BLOCO 7: Tarefas -->
    <section>
        <h2>✅ Lista de Tarefas (Checklist)</h2>
        <div class="destino">Arquivo: <code>array_tarefas.php</code></div>
        <form method="POST" action="array_tarefas.php">
            <p><i>Este arquivo usa dados internos e não precisa de entrada.</i></p>
            <input type="submit" value="Visualizar Tarefas">
        </form>
    </section>

    <!-- BLOCO 8: Eventos -->
    <section>
        <h2>📅 Agenda de Eventos</h2>
        <div class="destino">Arquivo: <code>array_eventos.php</code></div>
        <form method="POST" action="array_eventos.php">
            <p><i>Este arquivo usa dados internos e não precisa de entrada.</i></p>
            <input type="submit" value="Visualizar Agenda de Eventos">
        </form>
    </section>

</body>
</html>