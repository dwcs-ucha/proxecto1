<html lang="gl">
<head>
	<?php
		/**
		* @Autor: Cristóbal Romero
		* @GitHub: ZerinhoRomero
		* @DataCreacion: 12/11/2019
		* @UltimaModificacion: 10/12/2019
		* @Version: 0.0.9b
		**/
	?>
	<script type="text/javascript">
		function refresco(direccion, tempo){
			setTimeout(function(){ location.href=direccion; }, tempo);
		}
	</script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../Estilo/estilosA11.css">
	<title>Emparella imaxes</title>
</head>
<body>
	<wrapper class="d-flex flex-column">
  	<main class="container corpo" align="center">
  		{include file="../../layout/cabeceira.php"}
  		<h1>EMPARELLA</h1>
      {include file="../../layout/pe.php"}
    </main>
  </wrapper>
</body>
</html>
