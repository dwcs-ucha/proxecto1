<?php

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

Función para escribir en el fichero*/
function escribir($array)
{
    $fp = fopen('csv/puntuaciones.csv', 'a+');
    fputcsv($fp, $array);
    fclose($fp);
}/*Fin función escribir

++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Función para leer archivo csv
*/
function leer($archivo)
{
    if (($gestor = fopen($archivo, "r")) !== false) {
          $datos = array_map('str_getcsv', file($archivo));
        foreach ($datos as $key => $fila) { ?>
          <tr>
        <?php
        foreach ($fila as $key1 => $dato) { ?>
          <td><?php echo $dato; ?></td>
        <?php } ?>
      </tr>
        <?php
      }
        fclose($gestor);
    }
}//Fin función leer

 ?>
