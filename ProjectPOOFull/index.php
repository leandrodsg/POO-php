<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <pre>
        <?php
            require_once 'Video.php';
            $v[0] = new Video("Aula 01 - PHP");
            $v[1] = new Video("Aula 12 - POO");
            $v[2] = new Video("Aula 03 - HTML5");
            print_r($v);
            
            require_once 'Gafanhoto.php';
            $g[0] = new Gafanhoto("Denis", 22, "M", "DJ");
            $g[1] = new Gafanhoto("Maria", 34, "F", "maria");
            print_r($g);
            
            require_once 'Visualizacao.php';
            $vis[0] = new Visualizacao($g[0], $v[2]);
            $vis[0]->avaliar();
            $vis[1] = new Visualizacao($g[1], $v[1]);
            $vis[1]->avaliarPorc(85);
            print_r($vis);
        ?>
    </pre>
    </body>
</html>
