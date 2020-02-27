<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 12 de Octubre de 2019
 * Descripción: Menú de completado con dos decisiones dependiendo si el jugador quiere guardar su resultado o no
 * Versión: 1.2
 */
?>
<h1 class="titulo">VICTORIA</h1>
<h2>O CONSEGUICHES, ENHORABOA!!!</h2>
<h3>Queres gardar a puntuacion?</h3>

<a class="enlace" href="<?php echo "../guardar_puntuacion.php?dificultad=" . $_GET["dificultad"] . "&num_intentos=" . $num_intentos . "&juego_actual=" . $_POST["juego_actual"]?>">Sí</a><!-- Lleva a la página de guardar puntuación con la dificultad, número de intentos y juego correspondientes -->
<a class="enlace" href="../index.php">Non</a><!-- Se va a la página de inicio -->
