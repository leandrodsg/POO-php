<?php
    // clientes_cli.php

    $clientes = [
        ["nome" => "Ana", "email" => "ana@email.com", "cpf" => "12345678909", "cidade" => "SP"],
        ["nome" => "Carlos", "email" => "carlos.com", "cpf" => "12345678909", "cidade" => "SP"],
        ["nome" => "Diana", "email" => "", "cpf" => "", "cidade" => "RJ"]
    ];

    echo "Cadastro de Clientes (modo CLI)\n\n";

    // 1. Verificação de e-mail (tem '@' e '.')
    echo "1. E-mails válidos:\n";
    for ($i = 0; $i < count($clientes); $i++) {
        $email = $clientes[$i]["email"];
        $temArroba = false;
        $temPonto = false;
        for ($j = 0; $j < strlen($email); $j++) {
            if ($email[$j] === '@') $temArroba = true;
            if ($email[$j] === '.') $temPonto = true;
        }
        if ($temArroba && $temPonto) {
            echo "- " . $clientes[$i]["nome"] . ": $email\n";
        }
    }
