<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <pre>
        <?php
            require_once 'ContaBanco.php';
            $p1 = new ContaBanco();
            $p1->abrirConta("cc");
            $p1->setNumConta(1051);
            $p1->setDono("Jubileu");
            $p1->depositar(300);
            $p1->pagarMensal();
            $p1->sacar(338);
            print_r($p1);
            $p1->fecharConta();
            
            echo "<p>=================================</p>";
            echo "\n";
            
            $p2 = new ContaBanco();
            $p2->abrirConta("cp");
            $p2->setNumConta(4871);
            $p2->setDono("Maria");
            $p2->depositar(500);
            $p2->sacar(100);
            $p2->pagarMensal();
            print_r($p2);
            $p2->fecharConta();
            
        ?>
        </pre>
    </body>
</html>
