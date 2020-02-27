<?php
/*
 *Título:¿Que é? ¿para que serve? ¿para que se utiliza?  
 *Autor: Manuel Ángel Calvo Piñeiro
 *Versión: 1.1
 *Modificado: 01/12/2019
*/

include_once 'validacion_xogo.php';
include '../../librerias/utils.php';
/*var_dump($_POST);*/
$difRango = array(
    "min" => 1,
    "max" => 3,
    "def" => 1
);

$dif = validarDificultade($difRango, "dificultade");
switch ($dif){
    case 1:
        $preguntas = 2;
        break;
    case 2:
        $preguntas = 4;
        break;
    case 3:
        $preguntas = 5;
        break;
    default: 
        $preguntas = 2;
        break;
}

/*var_dump($dif, $preguntas);*/
$ruta = "csv/";
$cosa = lerCSV("$ruta"."cosa.csv", "r", ","); $contar = count(file("$ruta"."cosa.csv"));
$imaxe = lerCSV("$ruta"."imaxe.csv", "r", ",");
$manexo = lerCSV("$ruta"."manexo.csv", "r", ",");
$utilidade = lerCSV("$ruta"."utilidade.csv", "r", ",");
/*var_dump($cosa);
var_dump($imaxe);
var_dump($manexo);
var_dump($utilidade);*/
$cosa = azarCsv($cosa, $preguntas);
$manexo = azarCsv($manexo, $preguntas);
$utilidade = azarCsv($utilidade, $preguntas);

?>
<!DOCTYPE html>
<html lang="gl">
    <head>
        <?php
        $directorioRaiz ="../.."; //Ten que declararse ao principio e debe ter este nome
        include '../../layout/head.php'; //Debe escribirse no head
        ?>
        <title>¿Que é? ¿para que serve? ¿para que se utiliza?  </title>
        <link rel="stylesheet" type="text/css" href="estilos.css">
        <script src="script.js"></script>
    </head>
    <body>
		<wrapper class="d-flex flex-column">
		<main class="container corpo">
            <form id="xogo" method="post">
                <input type="hidden" value="<?php echo $dif; ?>" name="dificultade">
            </form>
            <?php
            include '../../layout/cabeceira.php'; //Debe escribirse ao principio do body
            ?>
            <h1 class="text-center titulo-h1">Xogo de preguntas con obxetos</h1>
            <div class="row">
                <?php
                $numero = 1;
                for($celdas = 0; $celdas < $contar; $celdas++){
                ?>
                <div id="preg<?php echo $numero; ?>" class="col-md-6 mx-auto">
                    <h2>Que e?</h2>
                    <div class="imaxe-max">
                        <img class="" src="<?php echo $imaxe[$celdas][0];?>">
                    </div>
                    <select name="cosa[]" id="cosa<?php echo $numero; ?>" form="xogo">
                        <option value=""></option>
                        <?php
                    for($quest = 0; $quest < $preguntas; $quest++){
                        ?>
                        <option value="<?php echo $cosa[$celdas][$quest]; ?>"> <?php echo $cosa[$celdas][$quest]; ?> </option>
                        <?php
                    }
                        ?>
                    </select>
                    <div class="c-opcions">
                        <?php 
                    for($quest = 0; $quest < $preguntas; $quest++){
                        ?>
                        <div class="opcion" value="<?php echo $cosa[$celdas][$quest]; ?>" onclick='seleccionar("preg<?php echo $numero;?>", "cosa<?php echo $numero; ?>", this)'><?php echo $cosa[$celdas][$quest];?></div>
                        <?php
                    }
                        ?>
                    </div>
                    <h2>Para que serve?</h2>
                    <select name="utilidade[]" id="utilidade<?php echo $numero; ?>" form="xogo">
                        <option value=""></option>
                        <?php
                    for($quest = 0; $quest < $preguntas; $quest++){
                        ?>
                        <option value="<?php echo $utilidade[$celdas][$quest]; ?>"> <?php echo $utilidade[$celdas][$quest]; ?> </option>
                        <?php
                    }
                        ?>
                    </select>
                    <div>
                        <?php 
                    for($quest = 0; $quest < $preguntas; $quest++){
                        ?>
                        <div class="opcion" value="<?php echo $utilidade[$celdas][$quest]; ?>" onclick='seleccionar("preg<?php echo $numero;?>", "utilidade<?php echo $numero; ?>", this)'><?php echo $utilidade[$celdas][$quest];?></div>
                        <?php
                    }
                        ?>
                    </div>
                    <h2>Como se utiliza?</h2>
                    <select name="manexo[]" id="manexo<?php echo $numero; ?>" form="xogo">
                        <option value=""></option>
                        <?php
                    for($quest = 0; $quest < $preguntas; $quest++){
                        ?>
                        <option value="<?php echo $manexo[$celdas][$quest]; ?>"> <?php echo $manexo[$celdas][$quest]; ?> </option>
                        <?php
                    }
                        ?>
                    </select>
                    <div>
                        <?php 
                    for($quest = 0; $quest < $preguntas; $quest++){
                        ?>
                        <div class="opcion" value="<?php echo $manexo[$celdas][$quest]; ?>" onclick='seleccionar("preg<?php echo $numero;?>", "manexo<?php echo $numero; ?>", this)'><?php echo $manexo[$celdas][$quest];?></div>
                        <?php
                    }
                        ?>
                    </div>

                </div>
                <?php
                    $numero++;
                }
                ?>
            </div>
            
            <?php
            include '../../layout/pe.php'; //Debe escribirse ao final do body
            ?>
        </main>
		</wrapper>
    </body>

</html>