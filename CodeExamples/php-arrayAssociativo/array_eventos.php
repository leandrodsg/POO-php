<?php
    // array_eventos.php

    // Lista de eventos com título, data e hora
    $eventos = [
        ['titulo' => 'Reunião com cliente', 'data' => '2025-05-20', 'hora' => '14:00'],
        ['titulo' => 'Apresentação final',  'data' => '2025-05-30', 'hora' => '10:00'],
        ['titulo' => 'Workshop PHP',        'data' => '2025-06-05', 'hora' => '09:00'],
        ['titulo' => 'Entrega de projeto',  'data' => '2025-05-29', 'hora' => '16:30'],
        ['titulo' => 'Revisão de código',   'data' => '2025-04-15', 'hora' => '11:00'],
    ];

    // Obtemos a data atual para comparação
    $hoje = date('Y-m-d');
    echo "<h1>Agenda de Eventos</h1>";
    echo "<p>Data atual: $hoje</p>";

    // ---------------------------------------------------------
    // 1. Listar todos os eventos
    // ---------------------------------------------------------
    echo "<h3>1. Todos os eventos:</h3>";
    foreach ($eventos as $e) {
        echo "{$e['titulo']} - {$e['data']} às {$e['hora']}<br>";
    }

    // ---------------------------------------------------------
    // 2. Verificar eventos passados, do dia e futuros
    // ---------------------------------------------------------
    echo "<h3>2. Classificação por data:</h3>";
    foreach ($eventos as $e) {
        if ($e['data'] < $hoje) {
            echo "⚠️ {$e['titulo']} (PASSADO)<br>";
        } elseif ($e['data'] === $hoje) {
            echo "📅 {$e['titulo']} (HOJE)<br>";
        } else {
            echo "✅ {$e['titulo']} (FUTURO)<br>";
        }
    }

    // ---------------------------------------------------------
    // 3. Validar formato de data e hora
    // ---------------------------------------------------------
    echo "<h3>3. Validação de formatos:</h3>";
    foreach ($eventos as $e) {
        $dataValida = preg_match('/^\d{4}-\d{2}-\d{2}$/', $e['data']);
        $horaValida = preg_match('/^\d{2}:\d{2}$/', $e['hora']);

        if (!$dataValida || !$horaValida) {
            echo "❌ Erro no evento '{$e['titulo']}' - Formato inválido.<br>";
        } else {
            echo "✔️ Formato válido em '{$e['titulo']}'<br>";
        }
    }

    // ---------------------------------------------------------
    // 4. Agrupar eventos por mês
    // ---------------------------------------------------------
    echo "<h3>4. Agrupamento por mês:</h3>";
    $meses = [];
    foreach ($eventos as $e) {
        $mes = date('Y-m', strtotime($e['data']));
        if (!isset($meses[$mes])) {
            $meses[$mes] = [];
        }
        $meses[$mes][] = $e['titulo'];
    }
    foreach ($meses as $mes => $titulos) {
        echo "📆 $mes: " . implode(", ", $titulos) . "<br>";
    }

    // ---------------------------------------------------------
    // 5. Eventos ordenados por data (cronograma)
    // ---------------------------------------------------------
    usort($eventos, function($a, $b) {
        return strtotime($a['data']) <=> strtotime($b['data']);
    });
    echo "<h3>5. Eventos ordenados por data:</h3>";
    foreach ($eventos as $e) {
        echo "{$e['data']} - {$e['titulo']}<br>";
    }
?>