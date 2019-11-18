<?php
    // 16/11/2019 | Versión 1.0

    // Recibe como parámetros a ruta ao ficheiro do cal ler o contido e o modo no cal levar a cabo a lectura.
    // Devolve FALSE en caso de erro e o array de datos, en caso de éxito.
    // OLLO: O delimitador de campos está definido na función como unha coma (,), se alguén ten un CSV que 
    //   empregue puntos e comas (;) ou outro caracter como delimitador, terá que empregar a segunda función.
    function lerCSV($ficheiro, $modo){        
        if($lectura= fopen($ficheiro, $modo)){
            // Obténse fila a fila o contido do ficheiro, gardándose na variable $datos:
            while(($fila= fgetcsv($lectura, ",")) != false){
                $datos[]= $fila;
            }
        }else{
            return false;
        }
        fclose($lectura);

        return $datos;
    }

    // Recibe como parámetros a ruta ao ficheiro do cal ler o contido, o modo no cal levar a cabo a lectura,
    //   e o delimitador empregado no CSV para separar os campos nas filas (a función anterior emprega a coma
    //   como delimitador).
    // Devolve FALSE en caso de erro e o array de datos, en caso de éxito.
    function lerCSV($ficheiro, $modo, $delimitador){        
        if($lectura= fopen($ficheiro, $modo)){
            // Obténse fila a fila o contido do ficheiro, gardándose na variable $datos:
            while(($fila= fgetcsv($lectura, $delimitador)) != false){
                $datos[]= $fila;
            }
        }else{
            return false;
        }
        fclose($lectura);

        return $datos;
    }



?>
