<!DOCTYPE html>
<html lang="gl">
<head>
  <?php
    $directorioRaiz ="../..";
    include '../../layout/head.php';
    include('funciones.php');
    ?>
<title>Xogo dos Sons - Puntuacións</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/sonidos.css">

</head>
<body>
  <?php
      include('../../layout/cabeceira.php'); ?>
      <table class="table table-striped">
        <caption>Táboa de puntuacións</caption>
      <tr><th>Xogo</th><th>Nome</th><th>Data</th><th>Gañados</th><th>Perdidos</th></tr>
      <?php leer("csv/puntuaciones.csv"); ?>
        </table>
        <?php
      include '../../layout/pe.php';
      ?>
</body>
</html>
