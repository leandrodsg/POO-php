<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <pre>
        <?php
            require_once 'Caneta.php';
            $c1 = new Caneta;
            $c1->modelo = "BIC Crystal";
            $c1->cor = "Azul";
            $c1->ponta = 0.5;
            $c1->carga = 90;
            $c1->tampada = false;
            $c1->rabiscar();
            print_r($c1);
            
            $c2 = new Caneta;
            $c1->modelo = "BIC";
            $c2->cor = "Vermelha";
            $c2->ponta = 0.7;
            $c1->carga = 50;
            $c2->tampada = true;
            $c2->rabiscar();
            print_r($c2);
        ?>
        </pre>
    </body>
</html>
