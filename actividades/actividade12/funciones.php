<?php 

//Creamos un diccionario con todas las imagenes:
$imagenes = array(
'1.png'=>'euforia',
'27.png'=>'indiferenza',
'20.png' =>'aburrimento',
'6.png'=>'felicidad',
'28.png' =>'namoramento',
'9.png' =>'pensativ@',
'6.png' =>'sorprendid@',
'25.png' =>'enojad@',
'20.png' =>'preguiza',
'2.png' => 'nervios@',
'4.png' =>'nostalxia',
'7.png'=>'alegria',
'23.png' => 'tristeza',
'16.png'=>'irritabilidade',
'18.png' => 'pesimismo',
'14.png' =>'extraversion',
'31.png'=>'timidez',
'32.png'=>'somnolient@',
'33.png'=>'ansiedade',
'34.png'=>'inhibido',
'35.png'=>'soidade',
'36.png'=>'asustad@',
'37.png'=>'nervios@',
'38.png'=>'vergoñent@',
'39.png'=>'celos@',
'40.png'=>'deprimid@',
'41.png'=>'preocupad@',
'42.png'=>'apenad@',
'43.png'=>'incomod@',
'44.png'=>'orgullos@',
'45.png'=>'disgustad@',
);

$aparecidos=[];
$resultados = null;

//Funcion que cogerá el csv y meterá los datos:
function guardarClasificacion($nombre, $aciertos, $errores, $nivel){

$nombre="Nome:$nombre";
$aciertos="Acertos: $aciertos";
$errores = "Erros: $errores";
$nivel = "Nivel: $nivel";

//Declaro el array que guardaremos
$datosPartida = array ($nombre, $aciertos, $errores, $nivel);

//Abrimos el fichero con privilegios de escribir
$fp = fopen('DAO.csv', 'a+');

//Volcamos los datos al fichero csv.
fputcsv($fp, $datosPartida);

//Cerramos la conexion con el fichero
fclose($fp);

}

function sacarClasificación(){

if (($gestor = fopen("DAO.csv", "r")) !== FALSE) {
	echo "<h3>Clasificación:</h3>";
    while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
        $numero = count($datos);
        for ($c=0; $c < $numero; $c++) {
            echo $datos[$c] . "<br />\n";
        }
        echo "------------------------";
    }
    
    fclose($gestor);
}

}

function comprobarFinal(){
	
	//Cogemos en el nivel en el que estamos
	if(isset($_POST['nivel'])){
		
		//Hacemos un cast de la variable para convertirla a int
		$aciertos =(int)$_POST['aciertos']; 
		$errores =(int)$_POST['errores'];
		$mensaje = null;
		
		switch($_POST['nivel']){
				
				case 'bajo':
				
				if($aciertos+$errores==9){
					
					if($aciertos>$errores){
					$mensaje = "Enhorabuena has ganado con una puntuación de: $aciertos/10 ";
					//Hacemos la llamada a la funcion para guardar la clasificación
					guardarClasificacion($_POST['nombre'],$_POST['aciertos'],$_POST['errores'],$_POST['nivel']);
					sacarClasificación();
					}else{
					$mensaje = "Has perdido con : $errores fallos ";
					guardarClasificacion($_POST['nombre'],$_POST['aciertos'],$_POST['errores'],$_POST['nivel']);
					sacarClasificación();
					}
				}
						
					return $mensaje;
					
				case 'medio':
				
				if($aciertos+$errores==19){
					
					if($aciertos>$errores)
					$mensaje = "Enhorabuena has ganado con una puntuación de: $aciertos/10 ";
					else
					$mensaje = "Has perdido con $errores fallos ";
					
				}
						
					return $mensaje;
				break;
				
				case 'alto':
								
				if($aciertos+$errores==29){
					
					if($aciertos>$errores)
					$mensaje = "Enhorabuena has ganado con una puntuación de: $aciertos/10 ";
					else
					$mensaje = "Has perdido con $errores fallos ";
					
				}
						
					return $mensaje;
					
				break;
				
		}
	}


}


//Funcion que se encarga de retornar el termino sin repetir
function cogerTermino($indice){
	
	//Declaramos las variables globales
		global $imagenes;
		global $aparecidos;
		
		//Declaramos un vector de terminos
		$terminos = [];
		//Cogemos todas las claves del vector imagenes
		$llaves = array_keys($imagenes);
		//Establecemos un limite que va en función de las llaves de "imagenes"
		$limite = count($llaves) - 1;
		//Guardamos tambien el estado de animo en el que estamos
		$estados = [];
		
		//Mientras el termino sea menor al indice sacamos 
		while(count($terminos) <= $indice){
			if(!in_array($imagenes[$termino = $llaves[rand(0, $limite)]], $aparecidos) && !in_array($termino, $terminos)){
				//Y si no esta el termino en el array lo metemos al igual que el estado
				$terminos[] = $termino;
				$estados[] = $imagenes[$termino];
			}
		}
		
		return [
			"terminos" => $terminos,
			"estado" => $estados[rand(0, $indice)]
		];
}

function comprobarRespuesta($foto,$termino){
	
	//Variables globales
	global $imagenes;
	global $aciertos;
	global $errores;
	global $aparecidos;
	global $resultados;
	
	if(!$aparecidos && isset($_POST["aparecidos"]))
		$aparecidos = explode(",", $_POST["aparecidos"]);
	
	/*Si la foto es igual al termino lo metemos dentro del vector 
	y incrementamos el valor de aciertos, si no lo contrario*/
	if($imagenes[$foto]==$termino){
		$cantidad=(int)$_POST['aciertos']+1;
		$aparecidos[] = $termino;
		$errores=(int)$_POST['errores'];
		$aciertos=$cantidad;
	}else{
		$cantidad=(int)$_POST['errores']+1;
		$aciertos=(int)$_POST['aciertos'];
		$errores=$cantidad;
	}
	
	$resultados = comprobarFinal();
}


//Funcion que coge las fotos del directorio segun el nivel de dificutad
function cargarFotos($nivel){
	
	//Declaramos una variable que será el total de elementos
	$elementos=0;
	//Hacemos globales las variables que necesitamos
	global $imagenes;
	global $aciertos;
	global $errores;
	global $termino;
	global $aparecidos;
	global $salidos;
	global $mensajeVictoria;
	global $mensajeDerrota;
	global $resultados;
	
	//Si no viene el nombre de la pagina principal viene del formulario
	if(isset($_GET['nombre'])){
	$nombre = $_GET['nombre'];	
	}else{
	$nombre = $_POST['nombre'];	
	}
	
	
	if(!$aparecidos && isset($_POST["aparecidos"]))
		$aparecidos = explode(",", $_POST["aparecidos"]);
	
	switch($nivel){
	
	case "bajo":
			
		//Asignamos el valor de los elementos
		$elementos=3;
		
		break;
	
	case "medio":
	
		$elementos=6;
	
		break;
		
	case "alto":
	
		$elementos=9;

		break;
	
	}
	
	//Miramos si las imagenes menos los aparecidos sea menor o igual a nuestros elementos	
	if(count($imagenes) - count($aparecidos) <= $elementos){
		echo "Ya se acabaron las convinaciones.";
		return; // No se pueden hacer más convinaciones.
	};
	
	$termino = cogerTermino($elementos - 1);
	
	//Aqui imprimimos el juego
	
	echo"<form method='post' action='index.php'><input type='submit' name='reiniciar' value='reiniciar'></form>";
	
	echo "<form method='POST' action='partida.php' id='formulario'>";
	
		echo "<table id='centrar'>";
			
			echo "<tr>";
			
			if($resultados==null){
				
				echo "<th>Acertos:$aciertos</th></th><th>".strtoupper($termino["estado"])."</th><th>Erros:$errores</th>";
				//Elementos lo determina el switch
				for($i=0; $i<$elementos; $i++){
					
					//Cerramos las filas cada tres imagenes
					if($i%3==0){
					echo "</tr><tr>";	
					}
					
					echo "<td id='foto'><button name='foto' value='" . $termino["terminos"][$i] . "' onclick='document.getElementById('formulario').submit();'><img src='./imagenes/" . $termino["terminos"][$i] . "'</button></td>";	
				}
				
			}else{
				echo $resultados;
			}
						
		echo "</table>";

	echo "<input type='hidden' name='nivel' value='$nivel'>";
	echo "<input type='hidden' name='termino' value='" . $termino["estado"] . "'>";
	echo "<input type='hidden' name='aciertos' value='$aciertos'>";
	echo "<input type='hidden' name='errores' value='$errores'>";
	echo "<input type='hidden' name='nombre' value='$nombre'>";
	echo "<input type='hidden' name='aparecidos' value='" . implode(",", $aparecidos) . "'>";

	echo "</form>";
	echo "<br>";
}
?>
