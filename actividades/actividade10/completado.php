<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 12 de Octubre de 2019
 * Descripción: Menú de completado con dos decisiones dependiendo si el jugador quiere guardar su resultado o no
 * Versión: 1.1
 */
?>
<h1 class="titulo">VICTORIA</h1>
<h2>LO CONSEGUISTE, ENHORABUENA!!!</h2>
<h3>Quieres guardar la puntuación?</h3>
<a class="enlace" href="<?php echo "../guardar_puntuacion.php?dificultad=" . $dificultad . "&num_intentos=" . $num_intentos?>">Sí</a>
<a class="enlace" href="../index.php">No</a>
