<?php
  // BreoBeceiro:22/11/2019
  // PROXECTO 1ª AVALIACIÓN | Versión 1.0
?>
<!doctype html>
<html lang="gl">
	<head>
		<?php
			$directorioRaiz ="../..";
			include '../../layout/head.php';
		?>
		<link rel="stylesheet" href="../estilos/estilos.css">
		<style type="text/css">
			
			.col { border: solid black 1px; }
			h1 { text-align: center; }
			img { width: 95%; }

		</style>
		<script type="text/javascript" src=""></script>
		<title>
			Actividade 1 | Inicio
		</title>
	</head>
	<body>
		<div class="container">
            <?php
                include('../../layout/cabeceira.php');

                // Se se pulsa no botón de 'Xogar!', introdúcense os valores dos radiobutton en sendas variables para
                //   construir a URL correspondente:
                if(isset($_POST['xogar'])){
                    $nivel= $_POST['nivel'];
                    $tema= $_POST['tema'];
                    
                    if($nivel== "nivel1"){
                        if($tema== "escuro"){
                            $url= "actividadeDoada.php?nivel1=true&tema=escuro";
                        }else{
                            $url= "actividadeDoada.php?nivel1=true&tema=claro";
                        }
                    }elseif($nivel== "nivel2"){
                        if($tema== "escuro"){
                            $url= "actividadeMedia.php?nivel2=true&tema=escuro";
                        }else{
                            $url= "actividadeMedia.php?nivel2=true&tema=claro";
                        }
                    }elseif($nivel== "nivel3"){
                        if($tema== "escuro"){
                            $url= "actividadeDificil.php?nivel3=true&tema=escuro";
                        }else{
                            $url= "actividadeDificil.php?nivel3=true&tema=claro";
                        }
                    }else{
                        if($tema== "escuro"){
                            $url= "actividadeDoada.php?nivel1=true&tema=escuro";
                        }else{
                            $url= "actividadeDoada.php?nivel1=true&tema=claro";
                        }
                    }
                    ?>
                    <script type="text/javascript">
                        // Con JavaScript, envíase ao usuario á páxina resultante das súas seleccións no formulario anterior:
                        window.location.href= "<?php echo $url; ?>";
                    </script>
                    <?php
                }
            ?>
			<div class="row align-items" >
				<div class="col-md-12">
					<h1>Completar sílabas e palabras</h1>
				</div>
				<div class="col-md-12">
					<p>
						Nesta actividade terás que inserir as sílabas que faltan nunha serie de palabras que verás en pantalla
						atendendo ás imaxes que as acompañan, pois as palabras correspóndense coas imaxes.
                        Dependendo da dificultade que escollas, terás que inserir unha soa sílaba por palabra ou a palabra
                        enteira, pero sempre co apoio de que as imaxes que verás serán as que te indiquen que palabras son as
                        correctas.
						<br />
						Se queres traballar o teu léxico e a túa memoria asociativa, sen dúbida esta é a túa actividade, así que
                        non agardes máis e non te cortes, proba sorte!
					</p>
				</div>
			</div>
			<div class="row">

					<div class="col-md-6">
	            		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	            			<fieldset>
	            				<legend>Elixe a dificultade</legend>
				                <div class="form-group">
				                    <input type="radio" name="nivel" value="nivel1" id="Nivel1" checked />
				                    <label for="Nivel1">Nivel 1 (baixa), a partir de 2 anos de idade:</label>
				                    <br />

				                    <input type="radio" name="nivel" value="nivel2" id="Nivel2" />
				                    <label for="Nivel2">Nivel 2 (media), a partir de 3 anos de idade:</label>
				                    <br />

				                    <input type="radio" name="nivel" value="nivel3" id="Nivel3" />
				                    <label for="Nivel3">Nivel 3 (alta), a partir de 4 anos de idade:</label>
				                    <br />
				                </div>
			            	</fieldset>

			            	<fieldset>
			            		<legend>Elixe o tema gráfico</legend>
				                <div class="form-group">
				                    <input type="radio" name="tema" value="claro" id="Claro" checked />
				                    <label for="Claro">Claro:</label>
				                    <br />

				                    <input type="radio" name="tema" value="escuro" id="Escuro" />
				                    <label for="Escuro">Escuro:</label>
				                    <br />
				                </div>
			            	</fieldset>

			                <input type="submit" name="xogar" id="Xogar" value="Xogar!" class="btn btn-primary" />
			                <br />
	                
	            		</form>
            		</div>
            		<div class="col-md-6">
            			<img src="Imaxes/actividade1_Nivel1.png" alt="Imaxe da actividade" />
            		</div>

				<div class="col-md-6">
				</div>
			</div>
			<?php
				include '../../layout/pe.php';
			?>
		</div>
	</body>
</html>