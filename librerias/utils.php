<?php
    // 02/12/2019 | Versión 1.0

	// ACTUALIZACIÓN (22/11/2019): A primeira función lerCSV() queda comentada, pois ao cargar este arquivo xérase unha excepción
	//   'fatal error' por non poder sobreescribirse a mesma función; isto débese a que, aínda que en PHP existe a sobrecarga de 
	//   funcións, hai que habilitala no php.ini, sen embargo, está desaconsellada. Por tanto, a función lerCSV() que queda dispoñible
	//   para empregar, é a máis polivalente, é dicir, a segunda, pois nela pódense empregar CSVs con delimitadores distintos da
	//   coma (,), o cal na primeira non era posible.

    // ACTUALIZACIÓN (03/12/2019): A función escribirCSV() está dispoñible e operativa para usos xerais. Os comentarios que a preceden
    //   explican os parámetros que recibe e os valores que devolve.

	// ACTUALIZACIÓN (05/02/2020): Engadida a funcion escribir_ordeadoCSV().
	// Está dispoñible e operativa para usos xerais. Os comentarios que a preceden
    	// explican os parámetros que recibe e os valores que devolve.
	

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

    // Recibe como parámetros a ruta ao ficheiro no cal escribir os datos, o modo no cal levar a cabo a escritura,
    //   e o array UNIDIMENSIONAL de datos a escribir no ficheiro.
    // Devolve FALSE en caso de erro e TRUE, en caso de éxito.
    function escribirCSV($ficheiro, $modo, $datos){
        if($escritura= fopen($ficheiro, $modo)){
                fputcsv($escritura, $datos);
        }else{
            return false;
        }
        
        fclose($escritura);
        return true;
    }

	/*Funcion para gardar a puntuacion*/
	/* Pasamoslle como parámetro o ficheiro, e os datos */
	/* Os datos os pasamos como array co seguinte orde:	
	Usuario, Contrasinal, Partidas Ganadas,Partidas Perdidas, Dificultade,Puntuación
	-----A PUNTUACIÓN A DE SER O ULTIMO CAMPO PARA ASÍ PODER ORDEAR CORRECTAMENTE-----
	 Para os campos que non se utilicen recomendo utilizar '-' para que non vaian vacios
	 e así evitar problemas.
	 EX: $datos = array('Nome','contraseña','-','-','Facil',10);
	*/
 	function escribir_ordeadoCSV($ficheiro,$datos){
   		 $rexistros = array();//Array que usaremos para ordear as puntuacións
    	if(!$fich = fopen($ficheiro, "r+")){//abrimos o ficheiro en lectura
    		return false;//se hai error devolve false
    	}else{
    		while($celdas = fgetcsv($fich,',')){
        		$celdas = array_reverse($celdas);
        		array_push($rexistros,$celdas);
       	 //gardamos no array de rexistros a fila do ficheiro pero dandolle a volta
    		}
    		fclose($fich);//pechamos o ficheiro
    		array_unshift($datos,0);//Creamos o novo rexistro
    /* Con array unshift engadimos un valor ó inicio do array. Engadimos 0 como
    	indentificador porque o imos cambiar ao ordear o array */    	
    		$datos = array_reverse($datos);//damoslle a volta para que o primeiro valor sea a puntuación
    		array_push($rexistros,$datos);//O engadimos o array de rexistros
    		rsort($rexistros);//Ordeamos os rexistros de maior a menor
    		for($i=0;$i<sizeof($rexistros);$i++){//Agora modificamos os identificadores
        		$rexistros[$i] = array_reverse($rexistros[$i]);//O volvemos a colocar en orde
        		$rexistros[$i][0] = $i + 1; //Modificamos o identificador
    		}
    /*Abrimos o ficheiro en modo escritura e que sobreescriba o que hai*/
    		if(!$fich = fopen($ficheiro, "w+")){
    			return false;//se hai error devolve false
    		}else{
    			for($i=0;$i<sizeof($rexistros);$i++){
      				fputcsv($fich,$rexistros[$i]);//Escribimos os rexistros no csv
  				}  		
  			}
  			fclose($fich);//pechamos o ficheiro
 		 }  
  		return true;//se todo esta ben devolve true
 	} 

?>
