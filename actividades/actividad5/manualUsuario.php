<!DOCTYPE html>
<html lang="gl">

<head>
  <?php
  //Cargamos todos los links para utilizarlos en la página
    $directorioRaiz ="../..";
    include '../../layout/head.php';
  ?>
  <title>Manual de Usuario-Xogando con sons</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/sonidos.css">
</head>

<body>
  <?php
  //Añadimos la cabecera con el menú
      include('../../layout/cabeceira.php');
      ?>
      <h2>Regras do xogo</h2>
      <p>O xogo consiste en identificar un son coa súa imaxe, para iso hai que elixir unha das tres opcións ( animais, situacións ou obxectos e comezar a xogar. Tes 10 intentos tras os cales a partida se almacenará nunha táboa que poderás consultar picando no botón "puntuacións".
Despois de terminar eses 10 intentos tamén sairá un botón no que poderás empezar unha nova partida.
Que o goces.Ata pronto.</p>
      <?php
      //Añadimos el pie de página
        include '../../layout/pe.php';
      ?>
</body>
</html>
