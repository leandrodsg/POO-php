<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Controlador</title>
    </head>
    <body>
        <pre>
        <?php
            require_once 'ControleRemoto.php';
            require_once 'Controlador.php';
            $c1 = new ControleRemoto();
            $c1->ligar();
            $c1->abrirMenu();
            echo "\n";
            print_r($c1);
        ?>
        </pre>
    </body>
</html>
