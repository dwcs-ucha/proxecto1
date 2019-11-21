<html>
<head>
	<?php
		/**
		* @Autor: Cristóbal Romero
		* @GitHub: ZerinhoRomero
		* @DataCreacion: 12/11/2019
		* @UltimaModificacion: 26/11/2019
		* @Version: 0.0.5b
		**/
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
	<link rel="stylesheet" href="estilos/estilosXogo.css">
	<title>Emparella imaxes</title>
</head>
<body>
	<?php
		require_once '../../layout/cabeceira.php';
	?>
	<h1>EMPARELLA</h1>
	<h2>Nivel <?php echo ($numeroCartas / 6); ?></h2>
	<form id="xogo" action="proxecto11_xogo.php" method="get">
		<?php
			$ganhador = false;
			echo '<div class="cartas'.$numeroCartas.'">';
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
						echo '<div class="imaxe">';
						echo '<a href="proxecto11_xogo.php?estado=1&numeroCartas='.$numeroCartas.'&intentos='.$intentos.'&acertos='.implode(",", $froitasAcertadas).'&froitas='.implode(",", $froitasNivel).'&casillaDescuberta1='.$i.'"><img src="imaxes/reverso.jpg" height="120px" width="130px"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '<div class="marcador">Intentos: '.$intentos.'   ----   Acertos: '.count($froitasAcertadas).'';
					break;
				case 1:
					$froitasNivel = explode(",", $_GET['froitas']);
					$casillaDescuberta1 = $_GET['casillaDescuberta1'];
					$intentos = $_GET['intentos'];
					$froitasAcertadas = explode(",", $_GET['acertos']);
					for($i = 0; $i < count($froitasNivel); $i++) {
						echo '<div class="imaxe">';
						if (in_array($froitasNivel[$i], $froitasAcertadas)) {
							echo '<img src="imaxes/'.$froitasNivel[$i].'.jpg" height="120px" width="130px">';
						} elseif ($i == $casillaDescuberta1) {
							echo '<img src="imaxes/'.$froitasNivel[$i].'.jpg" height="120px" width="130px">';
						} else {
							echo '<a href="proxecto11_xogo.php?estado=2&numeroCartas='.$numeroCartas.'&intentos='.$intentos.'&acertos='.implode(",", $froitasAcertadas).'&froitas='.implode(",", $froitasNivel).'&casillaDescuberta1='.$casillaDescuberta1.'&casillaDescuberta2='.$i.'"/><img src="imaxes/reverso.jpg" height="120px" width="130px"></a>';
						}
						echo '</div>';
					}
					echo '</div>';
					echo '<div class="marcador">Intentos: '.$intentos.'   ----   Acertos: '.(count($froitasAcertadas) - 1).'';
					break;
				case 2:
					$froitasNivel = explode(",", $_GET['froitas']);
					$casillaDescuberta1 = $_GET['casillaDescuberta1'];
					$casillaDescuberta2 = $_GET['casillaDescuberta2'];
					$intentos = $_GET['intentos'];
					$froitasAcertadas = explode(",", $_GET['acertos']);
					for($i = 0; $i < count($froitasNivel); $i++) {
						echo '<div class="imaxe">';
						if (in_array($froitasNivel[$i], $froitasAcertadas)) {
							echo '<img src="imaxes/'.$froitasNivel[$i].'.jpg" height="120px" width="130px">';
						} elseif ($i == $casillaDescuberta1 || $i == $casillaDescuberta2) {
							echo '<img src="imaxes/'.$froitasNivel[$i].'.jpg" height="120px" width="130px">';
						} else {
							echo '<a><img src="imaxes/reverso.jpg" height="120px" width="130px"></a>';
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
					echo '<div class="marcador">Intentos: '.$intentos.'   ----   Acertos: '.(count($froitasAcertadas) - 1).'';
					break;
				case 3:
					
					$froitasNivel = explode(",", $_GET['froitas']);
					$intentos = $_GET['intentos'];
					$froitasAcertadas = explode(",", $_GET['acertos']);
					for($i = 0; $i < count($froitasNivel); $i++) {
						echo '<div class="imaxe">';
						if (in_array($froitasNivel[$i], $froitasAcertadas)) {
							echo '<img src="imaxes/'.$froitasNivel[$i].'.jpg" height="120px" width="130px">';
						} else {
							echo '<a href="proxecto11_xogo.php?estado=1&numeroCartas='.$numeroCartas.'&intentos='.$intentos.'&acertos='.implode(",", $froitasAcertadas).'&froitas='.implode(",", $froitasNivel).'&casillaDescuberta1='.$i.'"><img src="imaxes/reverso.jpg" height="120px" width="130px"></a>';
						}
						echo '</div>';
					}
					echo '</div>';
					echo '<div class="marcador">Intentos: '.$intentos.'   ----   Acertos: '.(count($froitasAcertadas) - 1).'';
					if (count($froitasAcertadas) == (($numeroCartas / 2) + 1)) {
						$ganhador = true;
					}
					break;
			}
		?>
	</form>
	<div class="botonsFinal">
			<a class="botonFinal" href="proxecto11_index.php">Menu principal</a>
			<a class="botonFinal" href="proxecto11_xogo.php?estado=0&numeroCartas=6">Nivel fácil</a>
			<a class="botonFinal" href="proxecto11_xogo.php?estado=0&numeroCartas=12">Nivel medio</a><a class="botonFinal" href="proxecto11_xogo.php?estado=0&numeroCartas=18">Nivel difícil</a>
	</div>
	</div>
	<?php
		if ($ganhador) {
			echo '<div class="ganhador"><img src="imaxes/sandia.gif" height="303px" width="480px"><br>BO TRABALLO!!!!</div>';
		}
		require_once '../../layout/pe.php';
	?>
</body>
</html>