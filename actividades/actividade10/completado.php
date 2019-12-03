<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 12 de Octubre de 2019
 * Descripción: Menú de completado con login para guardar los resultados
 * Versión: 1.1
 */
?>
<h1 class="titulo">VICTORIA</h1>
<h2>LO CONSEGUISTE, ENHORABUENA!!!</h2>
<h3>Quieres guardar la puntuación?</h3>
<a href="<?php echo "../guardar_puntuacion.php?dificultad=" . $dificultad . "&num_intentos=" . $num_intentos?>">Sí</a>
<a href="../index.php">No</a>
