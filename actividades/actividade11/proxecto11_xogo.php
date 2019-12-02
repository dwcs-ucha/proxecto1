<!doctype html>
<html>
<head>
	<?php
		/**
		* @Autor: Cristóbal Romero
		* @GitHub: ZerinhoRomero
		* @DataCreacion: 12/11/2019
		* @UltimaModificacion: 28/11/2019
		* @Version: 0.0.8b
		**/
		$directorioRaiz = '../..';
		require_once '../../layout/head.php';
		if(isset($_POST['numeroCartas'])) {
			$numeroCartas = $_POST['numeroCartas'];
		} else {
			$numeroCartas = $_GET['numeroCartas'];
		}
	?>
	<script type="text/javascript">
		function refresco(direccion, tempo){
			setTimeout(function(){ location.href=direccion; }, tempo);
		}
	</script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="styles/estilosXogo.css">
	<title>Emparella imaxes</title>
</head>
<body>
	<div class="container-fluid corpo" align="center">
	<?php
		require_once '../../layout/cabeceira.php';
	?>
	<h1>EMPARELLA</h1>
	<h2><small>Nivel <?php echo ($numeroCartas / 6); ?></small></h2> 
	<form id="xogo" action="proxecto11_xogo.php" method="get">
		<?php
			echo '<div class="row">';
			echo '<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 cartas'.$numeroCartas.'" align="center">';
			if(isset($_GET['estado'])) {
				$estado = $_GET['estado'];
			} else {
				$estado = 0;
			}
			switch ($estado) {
				case 0:
					$imaxes = array('allo', 'amorodo', 'cebola', 'cenoria', 'cereixas', 'col', 'framboesa', 'laranxa', 'mango', 'maza', 'pemento', 'pepino', 'pera', 'pexego', 'platano', 'sandia', 'tomate', 'uvas');
					$intentos = 0;
					$froitasNivel = array();
					$froitasAcertadas = array();
					while(count($froitasNivel) != $numeroCartas) {
						$imaxe = $imaxes[random_int(0, 17)];
						while(!in_array($imaxe, $froitasNivel)) {	
							$froitasNivel[] = $imaxe;
							$froitasNivel[] = $imaxe;
						}
					}
					shuffle($froitasNivel);
					for($i = 0; $i < count($froitasNivel); $i++) {
						echo '<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 imaxe">';
						echo '<a href="proxecto11_xogo.php?estado=1&numeroCartas='.$numeroCartas.'&intentos='.$intentos.'&acertos='.implode(",", $froitasAcertadas).'&froitas='.implode(",", $froitasNivel).'&casillaDescuberta1='.$i.'"><img class="img-responsive" src="imaxes/reverso.jpg"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 menu">';
					echo '<div class="marcador" align="center">Intentos: '.$intentos.'   --   Acertos: '.count($froitasAcertadas).'</div>';
					break;
				case 1:
					$froitasNivel = explode(",", $_GET['froitas']);
					$casillaDescuberta1 = $_GET['casillaDescuberta1'];
					$intentos = $_GET['intentos'];
					$froitasAcertadas = explode(",", $_GET['acertos']);
					for($i = 0; $i < count($froitasNivel); $i++) {
						echo '<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 imaxe">';
						if (in_array($froitasNivel[$i], $froitasAcertadas)) {
							echo '<img class="img-responsive" src="imaxes/'.$froitasNivel[$i].'.jpg">';
						} elseif ($i == $casillaDescuberta1) {
							echo '<img class="img-responsive" src="imaxes/'.$froitasNivel[$i].'.jpg">';
						} else {
							echo '<a href="proxecto11_xogo.php?estado=2&numeroCartas='.$numeroCartas.'&intentos='.$intentos.'&acertos='.implode(",", $froitasAcertadas).'&froitas='.implode(",", $froitasNivel).'&casillaDescuberta1='.$casillaDescuberta1.'&casillaDescuberta2='.$i.'"/><img class="img-responsive" src="imaxes/reverso.jpg"></a>';
						}
						echo '</div>';
					}
					echo '</div>';
					echo '<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 menu">';
					echo '<div class="marcador" align="center">Intentos: '.$intentos.'   --   Acertos: '.(count($froitasAcertadas) - 1).'</div>';
					break;
				case 2:
					$froitasNivel = explode(",", $_GET['froitas']);
					$casillaDescuberta1 = $_GET['casillaDescuberta1'];
					$casillaDescuberta2 = $_GET['casillaDescuberta2'];
					$intentos = $_GET['intentos'];
					$froitasAcertadas = explode(",", $_GET['acertos']);
					for($i = 0; $i < count($froitasNivel); $i++) {
						echo '<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 imaxe">';
						if (in_array($froitasNivel[$i], $froitasAcertadas)) {
							echo '<img class="img-responsive" src="imaxes/'.$froitasNivel[$i].'.jpg">';
						} elseif ($i == $casillaDescuberta1 || $i == $casillaDescuberta2) {
							echo '<img class="img-responsive" src="imaxes/'.$froitasNivel[$i].'.jpg">';
						} else {
							echo '<a><img class="img-responsive" src="imaxes/reverso.jpg"></a>';
						}
						echo '</div>';
					}
					if ($froitasNivel[$casillaDescuberta1] != $froitasNivel[$casillaDescuberta2]) {
						$intentos++;
						$direccion = '"proxecto11_xogo.php?estado=3&numeroCartas='.$numeroCartas.'&intentos='.$intentos.'&acertos='.implode(",", $froitasAcertadas).'&froitas='.implode(",", $froitasNivel).'"';
						echo '<script type="text/javascript">';
							echo 'refresco('.$direccion.', 600);';
						echo '</script>';
					} 
					if ($froitasNivel[$casillaDescuberta1] == $froitasNivel[$casillaDescuberta2]) {
						$froitasAcertadas[] = $froitasNivel[$casillaDescuberta1];
						$intentos++;
						$direccion = '"proxecto11_xogo.php?estado=3&numeroCartas='.$numeroCartas.'&intentos='.$intentos.'&acertos='.implode(",", $froitasAcertadas).'&froitas='.implode(",", $froitasNivel).'"';
						echo '<script type="text/javascript">';
							echo 'refresco('.$direccion.', 0);';
						echo '</script>';
					}
					echo '</div>';
					echo '<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 menu">';
					echo '<div class="marcador" align="center">Intentos: '.$intentos.'   --   Acertos: '.(count($froitasAcertadas) - 1).'</div>';
					break;
				case 3:
					$froitasNivel = explode(",", $_GET['froitas']);
					$intentos = $_GET['intentos'];
					$froitasAcertadas = explode(",", $_GET['acertos']);
					for($i = 0; $i < count($froitasNivel); $i++) {
						echo '<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 imaxe">';
						if (in_array($froitasNivel[$i], $froitasAcertadas)) {
							echo '<img class="img-responsive" src="imaxes/'.$froitasNivel[$i].'.jpg">';
						} else {
							echo '<a href="proxecto11_xogo.php?estado=1&numeroCartas='.$numeroCartas.'&intentos='.$intentos.'&acertos='.implode(",", $froitasAcertadas).'&froitas='.implode(",", $froitasNivel).'&casillaDescuberta1='.$i.'"><img class="img-responsive" src="imaxes/reverso.jpg"></a>';
						}
						echo '</div>';
					}
					echo '</div>';
					echo '<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 menu">';
					echo '<div class="marcador" align="center">Intentos: '.$intentos.'   --   Acertos: '.(count($froitasAcertadas) - 1).'</div>';
					if (count($froitasAcertadas) == (($numeroCartas / 2) + 1)) {
						$direccion = '"proxecto11_xogo.php?estado=4&numeroCartas='.$numeroCartas.'&intentos='.$intentos.'&acertos='.implode(",", $froitasAcertadas).'&froitas='.implode(",", $froitasNivel).'"';
						echo '<script type="text/javascript">';
							echo 'refresco('.$direccion.', 300);';
						echo '</script>';
					}
					break;
				case 4:
					$froitasNivel = explode(",", $_GET['froitas']);
					$intentos = $_GET['intentos'];
					$froitasAcertadas = explode(",", $_GET['acertos']);
					echo '<div class="row">';
					echo '<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 baleiro"></div>';
					echo '<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ganhador" align="center"><img src="imaxes/sandia.gif" height="303px" width="480px"></div>';
					echo '</div>';
					echo '<div class="row" text-center><div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 baleiro"></div><span class="mensaxe">Bo TRABALLo!!!</span></div>';
					echo '</div>';
					echo '<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 menu">';
					echo '<div class="marcador" align="center">Intentos: '.$intentos.'   --   Acertos: '.(count($froitasAcertadas) - 1).'</div>';
					break;
			}
		?>
	</form>
		<div class="botons" align="center">
			<a class="botonFinal" href="proxecto11_index.php">Menu principal</a>
			<a class="botonFinal" href="proxecto11_xogo.php?estado=0&numeroCartas=6">Nivel fácil</a>
			<a class="botonFinal" href="proxecto11_xogo.php?estado=0&numeroCartas=12">Nivel medio</a>
			<a class="botonFinal" href="proxecto11_xogo.php?estado=0&numeroCartas=18">Nivel difícil</a>
		</div>
	</div>
	</div>
	</div>
	<?php
		require_once '../../layout/pe.php';
	?>
	
</body>
</html>