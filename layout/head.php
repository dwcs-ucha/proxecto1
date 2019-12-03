<?php
// 21/11/2019 | Versión 1.0
// Estrutura do <head> a engadir en cada páxina do sitio.
// Esta estrutura proporciona o xogo de caracteres UTF-8 e a composición da escala dos navegadores para dispositivos móbiles, así 
//   como a biblioteca de BootStrap e o enlace á folla de estilos do sitio.
// O cometido desta páxina é incluírse no interior das etiquetas <head> de cada páxina para aforrar traballo, xa que as seguintes
//   liñas serán comúns a todas elas. Logo de engadirse este arquivo, cada participante poderá engadir a súa propia folla CSS, así
//   como ficheiros JS coa etiqueta <script> e, naturalmente, o título da páxina con <title>.
$directorioRaiz = isset($directorioRaiz) ? $directorioRaiz : "../..";
?>
<meta charset = "UTF-8">
<meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity = "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin = "anonymous">
<script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity = "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin = "anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?= $directorioRaiz ?>/estilos/estilos.css" type="text/css">

