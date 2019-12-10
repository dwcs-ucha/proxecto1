<?php
/*
 *Título:¿Que é? ¿para que serve? ¿para que se utiliza?  
 *Autor: Manuel Ángel Calvo Piñeiro
 *Versión: 1
 *Modificado: 01/12/2019
*/

/*
validarDificultade(
 array(
  "min" => int, //mínima dificultade
  "max" => int, //máxima dificultade
  "def" => int //dificultade por defecto
 ),
 string //nome da chave (key) dentro do array $_POST que desexamos validar. Exemplo: $_POST['dificultade']
);
*/
function validarDificultade($difRango, $difPost){
    $difPost = isset($_POST[$difPost]) ? filter_var($_POST[$difPost],FILTER_SANITIZE_NUMBER_INT) : null; 
    if(filter_var($difPost, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$difRango['min'], "max_range"=>$difRango['max']))) === false) {
        return $difRango['def'];
    } else {
        return $difPost;
    }
}

function azarCsv($ficheiro, $preguntas){
    $resultado = array();
    for($linha = 0; $linha < count($ficheiro); $linha++){
        for($columna = 0; $columna < $preguntas; $columna++){
            if($columna == 0){
                $resultado[$linha][0] = $ficheiro[$linha][$columna];
            } else {
                $resultado[$linha][$columna] = $ficheiro[$linha][$columna];
                if($preguntas - $columna == 1){
                    shuffle($resultado[$linha]);
                }
            }
        }
    }
    return $resultado;
}
?>
