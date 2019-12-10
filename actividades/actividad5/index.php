 <!DOCTYPE html>
<html>
<head>
<title>Jugando con sonidos</title>
<link rel="stylesheet" href="css/sonidos.css">
<?php
 /**
         * @Autor: Javier Torrón González
         * */
     
        include '../../layout/head.php';
        ?>
</head>
<body>
<?php
 include '../../layout/cabeceira.php';
?>
<div id="inicio">
<h1>Bienvenido a juega con sonidos.</h1>
<p>El juego trata de relacionar un sonido con su animal. Pincha en el play y cuando lo tengas claro pulsa el icono del animal.</p>
<img id="ini" src="imagenes/delfin.gif"/>
<form action="sonidos.php" method="GET">
  <p>Suerte!!!. Comencemos.</p>
  <br><br>
  <input class="boton" type="submit" value="Jugar">
</form>
</div>
<?php
 include '../../layout/pe.php';
?>
</body>
</html> 