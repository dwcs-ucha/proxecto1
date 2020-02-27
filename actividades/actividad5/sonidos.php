<!DOCTYPE html>
<html lang="gl">
<head>
  <?php
    $directorioRaiz ="../..";
    include '../../layout/head.php';
    ?>
<title>Xogo dos Sons</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/sonidos.css">

</head>
<body>
  <?php
      include('../../layout/cabeceira.php');
      include('funciones.php');


      //Pasamos el archivo csv (sonidos.csv) a un array
      $sonidos = array_map('str_getcsv', file('csv/sonidos.csv'));

?>
<!--Contenedor para el botón de puntuaciones-->
<div id="puntuacion">
  <a href="puntuaciones.php?puntuaciones=1"><img src="imagenes/puntuar.png" title="Puntuaciones" alt="Puntuaciones"></a>
</div><br>
<?php
//Guardamos en variables la selección y el nombre del jugador
if (isset($_POST['jugar'])) {
    $seleccion = $_POST['opciones'];
    $elementos = count($sonidos[$seleccion]);
    $aleatorio = rand(0, ($elementos-1));
    $nombre = $_POST['nombre'];
    //Inicializo las variables...
    //Contador de partidas ganadas y perdidas
    $ganadas = 0;
    $perdidas = 0;
    //Mensaje de resultado si se ha acertado o fallado
    $mensaje = "";
    //Mensaje de victoria, empate o derrota
    $victoria = "";
} else {
    //Variables pasadas por el método GET al recargarse la página
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $victoria = "";
        if (isset($_GET['juego']) && isset($_GET['sonido']) && isset($_GET['random'])
        && isset($_GET['ganadas']) && isset($_GET['nombre'])) {
            $seleccion = $_GET['juego'];
            $elementos = count($sonidos[$seleccion]);
            $aleatorio = rand(0, ($elementos-1));
            $nombre = $_GET['nombre'];
            $sonido=$_GET['sonido'];
            $random=$_GET['random'];
            $ganadas=$_GET['ganadas'];
            $perdidas=$_GET['perdidas'];

            if ($random == $sonido) {
                $ganadas++;

                $mensaje = "<img class='acierto' src='imagenes/feliz.png' title='Cara feliz' alt='cara feliz'>
                <span style='color:green;'><p>Parabén, acertaches!!!</p></span>";
            } else {
                $perdidas++;
                $mensaje = "<img class='acierto' src='imagenes/triste.png' title='Cara triste' alt='cara triste'>
                <span style='color:red;'><p>Síntoo, fallaches. Téntao outra vez!!!</p></span>";
            }
            //Sumo el total de las jugadas(ganadas+perdidas)
            $ganadas = (int)$ganadas;
            $perdidas = (int)$perdidas;
            $totales = $ganadas + $perdidas;

            if ($totales ==  10) {
                switch ($seleccion) {
                  case '0':
                    $opcion = "Animais";
                    break;
                  case '1':
                    $opcion = "Situacións";
                    break;

                    case '2':
                      $opcion = "Obxectos";
                      break;
                }
                //Guardamos en un array los valores juego, nombre, fecha y partidas ganadas/perdidas para pasarlos al archivo csv(puntuaciones.csv)
                $arrayPartida = array();
                date_default_timezone_set('Europe/Madrid');
                setlocale(LC_TIME, 'es_ES');
                $fecha=date("d-m-Y/H:i:s");
                $arrayPartida[0] = $opcion;
                $arrayPartida[1] = $nombre;
                $arrayPartida[2] = $fecha;
                $arrayPartida[3] = $ganadas;
                $arrayPartida[4] = $perdidas;
                //Saco un mensaje si gana, pierde o empata
                if ($ganadas > $perdidas) {
                    $victoria = "<span style='color:green;'><p>Parabén gañaches o reto!!!</p></span>";
                } elseif ($ganadas == $perdidas) {
                    $victoria = "<span style='color:yellow;'><p>Empate!!!</p></span>";
                } else {
                    $victoria = "<span style='color:red;'><p>Volve tentalo!!!</p></span>";
                }
                //Escribo el array en el archivo puntuaciones.csv
                escribir($arrayPartida); ?>
                <button><a href="index.php">Comezar o xogo</a></button>
                <?php
            }
        }
    }
}
  ?>
<!--Contenedor para el play de los sonidos-->
<div id="sonidos">
<h3>Presta atención <?php echo $nombre; ?> !!!</h3>
<?php echo $victoria; ?>
<audio controls src="mp3/<?php echo $sonidos[$seleccion][$aleatorio]; ?>.mp3" type="audio/mp3"></audio>
<br><br>
<?php
//Recorremos el array $sonidos para sacar por pantalla las imágenes de los objetos
foreach ($sonidos[$seleccion] as $key=>$valor) {
    ?>
<!--Variables pasadas por el método GET al pulsar en la imagen que corresponda-->
<a href="sonidos.php?
sonido=<?php echo $key; ?>
&random=<?php echo $aleatorio; ?>
&juego=<?php echo $seleccion; ?>
&nombre=<?php echo $nombre; ?>
&ganadas=<?php echo $ganadas; ?>
&perdidas=<?php echo $perdidas; ?> ">
  <img id="son" src="imagenes/<?php echo $valor; ?>.png" alt="<?php echo $valor; ?>">
</a>

<?php
}?>
 <br>

<?php
echo $mensaje;
?>

</div>
<?php
  include '../../layout/pe.php';
?>
</body>
</html>
