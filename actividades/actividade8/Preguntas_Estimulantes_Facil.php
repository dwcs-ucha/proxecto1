<html>
<head> 
<title>Preguntas Estimulantes</title>
<?php
	/*
	* Autor:LorenzoOS
	* FechaCreación: 12/11/2019
	* FechaModificación:28/11/2019
	* Version: 0.1
	*/
	require_once('../../layout/head.php');
?>
</head>
<link rel="stylesheet" href="estilos/estilosPreguntas.css">
<body>
<?php
	require_once('../../layout/cabeceira.php');
?>
<div id="cabecera"><h1>Juego Preguntas Estimulantes</h1></div> 
<form action="Preguntas_Estimulantes_Facil.php" method="POST" >
<div id="jugar">
<?php
	
	$arrayImagenes = ['imaxes/jirafa.png','imaxes/perro.png','imaxes/coche.png','imaxes/tiburon.png','imaxes/boli.png','imaxes/chocolate.png','imaxes/camiseta.png','imaxes/bolso.png'];
	$arrayRespuesta = ['Caballo','Gato','Moto','Delfin','Lapiz','Sopa','Sudadera','Mochila'];
	$numerosUsados = array();
	$aciertos= 0;
	$fallos = 0;
	$numeroAleatorio = random_int(0,7);
	
	if(isset($_POST['btnJugarFacil']) || isset($_POST['btnSiguiente'])){
		
	
	
	
			switch($numeroAleatorio){
				
				case 0:
					echo '<p><img src="'.$arrayImagenes[$numeroAleatorio].'"></p> 
					<input name="valor" type="hidden" value="'.$numeroAleatorio.'"
					<p class="pista">El animal empieza por <b>Ca </b> y Termina por <b>llo</b></p>
					<input class="btnAcierto" type="submit"  name="btnAcierto" value="Caballo">&nbsp;
					<input class="btnFallo"   type="submit"  name="btnFallo" value="Elefante">&nbsp;
					<input class="btnFallo"   type="submit"  name="btnFallo" value="Hipopótamo"></p>';
				break;
				
				
				
				case 1:
					echo '<p><img src="'.$arrayImagenes[$numeroAleatorio].'"></p>
					<input name="valor" type="hidden" value="'.$numeroAleatorio.'"
					<p class="pista">El animal empieza por <b>G </b> y Termina por <b>o</b></p>
					<p><input class="btnAcierto" type="submit"  name="btnAcierto" value="Gato">&nbsp;
					<input class="btnFallo"   type="submit"  name="btnFallo" value="Elefante">&nbsp;
					<input class="btnFallo"   type="submit"  name="btnFallo" value="Hipopótamo"></p>';
				break;
				
				case 2:
					echo '<p><img src="'.$arrayImagenes[$numeroAleatorio].'"></p>
					<input name="valor" type="hidden" value="'.$numeroAleatorio.'"
					<p class="pista">El vehiculo empieza por <b>M</b> y Termina por <b>o</b></p>
					<p><input class="btnAcierto" type="submit"  name="btnAcierto" value="Moto">&nbsp;
					<input class="btnFallo"   type="submit"  name="btnFallo" value="Barco">&nbsp;
					<input class="btnFallo"   type="submit"  name="btnFallo" value="Avión"></p>';
				break;
				
				case 3:
					echo '<p><img src="'.$arrayImagenes[$numeroAleatorio].'"></p>
					<input name="valor" type="hidden" value="'.$numeroAleatorio.'"
					<p class="pista">El animal empieza por <b>D</b> y Termina por <b>ín</b></p>
					<p><input class="btnAcierto" type="submit"  name="btnAcierto" value="Delfín">&nbsp;
					<input class="btnFallo"   type="submit"  name="btnFallo" value="Elefante">&nbsp;
					<input class="btnFallo"   type="submit"  name="btnFallo" value="Hipopótamo"></p>';
				break;
				
				case 4:
					echo '<p><img src="'.$arrayImagenes[$numeroAleatorio].'"></p>
					<input name="valor" type="hidden" value="'.$numeroAleatorio.'"
					<p class="pista">El objeto empieza por <b>L</b> y Termina por <b>z</b></p>
					<p><input class="btnAcierto" type="submit"  name="btnAcierto" value="Lapiz">&nbsp;
					<input class="btnFallo"   type="submit"  name="btnFallo" value="Goma">&nbsp;
					<input class="btnFallo"   type="submit"  name="btnFallo" value="Papel"></p>';
				break;
				
				case 5:
					echo '<p><img src="'.$arrayImagenes[$numeroAleatorio].'"></p>
					<input name="valor" type="hidden" value="'.$numeroAleatorio.'"
					<p class="pista">La bebida empieza por <b>S</b> y Termina por <b>a</b></p>
					<p><input class="btnAcierto" type="submit"  name="btnAcierto" value="Sopa">&nbsp;
					<input class="btnFallo"   type="submit"  name="btnFallo" value="Refresco">&nbsp;
					<input class="btnFallo"   type="submit"  name="btnFallo" value="Zumo"></p>';
				break;
				
				case 6:
					echo '<p><img src="'.$arrayImagenes[$numeroAleatorio].'"></p>
					<input name="valor" type="hidden" value="'.$numeroAleatorio.'"
					<p class="pista">La pieza de ropa empieza por <b>Su</b> y Termina por <b>era</b></p>
					<p><input class="btnAcierto" type="submit"  name="btnAcierto" value="Sudadera">&nbsp;
					<input class="btnFallo"   type="submit"  name="btnFallo" value="Camiseta">&nbsp;
					<input class="btnFallo"   type="submit"  name="btnFallo" value="Pantalón"></p>';
				break;
				
				case 7:
					echo '<p><img src="'.$arrayImagenes[$numeroAleatorio].'"></p>
					<input name="valor" type="hidden" value="'.$numeroAleatorio.'"
					<p class="pista">El accesorio empieza por <b>Mo</b> y Termina por <b>la</b></p>
					<p><input class="btnAcierto" type="submit"  name="btnAcierto" value="Mochila">&nbsp;
					<input class="btnFallo"   type="submit"  name="btnFallo" value="Gorra">&nbsp;
					<input class="btnFallo"   type="submit"  name="btnFallo" value="Sombrero"></p>';
				break;
				
				}
				
						
		
		
		
		
	}
?>
</div>

<div id="botones">
<?php	
	if(isset($_POST['btnAcierto']) || isset($_POST['btnFallo'])){

		if(isset($_POST['btnAcierto'])){
				$numerosUsados[]= $_POST['valor'];
				$aciertos++;
				echo '<img src="'.$arrayImagenes[$_POST['valor']].'">';			
				echo '<p id="acierto"><input class="btnAcierto" type="button"  name="btnAcierto" value="'.$arrayRespuesta[$_POST['valor']].'">&nbsp;  (HAS ACERTADO) &nbsp; ';
				echo '<input class="btnSiguiente" type="submit"  name="btnSiguiente" value="Siguiente"></p>';
				
			}
			
		if(isset($_POST['btnFallo'])){
				$numerosUsados[]= $_POST['valor'];
				$fallos++;
				echo '<img src="'.$arrayImagenes[$_POST['valor']].'">';			
				echo '<p id="error">ERROR!,La Respuesta correcta era <input class="btnAcierto" type="button"  name="btnAcierto" value="'.$arrayRespuesta[$_POST['valor']].'">&nbsp;  SIGUE JUGANDO &nbsp;';
				echo '<input class="btnSiguiente" type="submit"  name="btnSiguiente" value="Siguiente"> </p>';
				
			}	
	}		
	
	
?>


</div>
<?php
	require_once('../../layout/pe.php');
?>
</body>
</html>