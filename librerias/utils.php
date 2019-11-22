<?php
    // 22/11/2019 | Versión 1.0
	// ACTUALIZACIÓN (22/11/2019): A primeira función lerCSV() queda comentada, pois ao cargar este arquivo xérase unha excepción
	//   'fatal error' por non poder sobreescribirse a mesma función; isto débese a que, aínda que en PHP existe a sobrecarga de 
	//   funcións, hai que habilitala no php.ini, sen embargo, está desaconsellada. Por tanto, a función lerCSV() que queda dispoñible
	//   para empregar, é a máis polivalente, é dicir, a segunda, pois nela pódense empregar CSVs con delimitadores distintos da
	//   coma (,), o cal na primeira non era posible.

    // Recibe como parámetros a ruta ao ficheiro do cal ler o contido e o modo no cal levar a cabo a lectura.
    // Devolve FALSE en caso de erro e o array de datos, en caso de éxito.
    // OLLO: O delimitador de campos está definido na función como unha coma (,), se alguén ten un CSV que 
    //   empregue puntos e comas (;) ou outro caracter como delimitador, terá que empregar a segunda función.
	/*
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
    }*/

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
