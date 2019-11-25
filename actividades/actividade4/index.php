<!DOCTYPE html>
<html>
    <head>
        <?php
        require_once '../../layout/head.php'; /* Contén etiquetas coma meta, link, script */
        ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Agrupar elementos</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <?php
        require_once '../../layout/cabeceira.php'; /* Contén a cabeceira, que consiste nun menú horizontal <nav> [...] </nav> */
        ?>
        <form action="actividade.php" method="post">
            <img src="icono.png" height="300" width="300"/>
            <h1>Xogo de agrupar elementos por categorías</h1>
            <p>
                Material para traballar a pertenencia ou non pertenencia dun obxeto a unha categoría de vocabulario dada.
            </p>
            Dificultade
            Fácil <input type="radio" name="dificultade" value="facil"/>
            Normal <input type="radio" name="dificultade" value="normal" checked/>
            Difícil <input type="radio" name="dificultade" value="dificil"/>

            <button type="submit" name="enviar">Xogar</button>
        </form>
        <?php
        require_once '../../layout/pe.php'; /* Contén o pé da páxina (<footer>[...]</footer>) */
        ?>
    </body>
</html>