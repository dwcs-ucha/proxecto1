<html>
    <head>
        <title>Título</title>
        <meta charset="utf-8"/>
        <script src="script.js"></script>
        <style>
            img {
                border-style : solid;
                width : 150;
                height : 150;
            }
        </style>
    </head>
    <body>
        <form method = "post" action = "prueba.php">
            <?php
            $rutaImagenes = "Imagenes/";
            $categoria = "animais/";

            $buenos = getImagenesBuenas();
            $malos = getImagenesMalas();

            for ($i = 0; $i < 20; $i++) {?>
		    <input id = "seleccionada<?php echo $i ;?>" type = "hidden" name = "seleccionada<?php echo $i; ?>" value = ""/>
                    <img id = "imagen-<?php echo $i; ?>" src = "<?php echo next($buenos); ?>" onclick = "seleccionar(this)"/>
                <?php
                
            }
            ?>
            <input type = "submit" value = "Enviar"/>
        </form>
        <?php

        function getImagenesBuenas() {
            global $categoria;
            global $rutaImagenes;

	    $archivo = fopen("categorias.csv", "r");
	    $linea = fgetcsv($archivo, ",");
	    $categoria = $linea[0]."/";
	    for ($columna = 1; $columna < count($linea); $columna++) 
	    {
	    	$buenos[] = $rutaImagenes.$categoria.$linea[$columna].".JPG";
	    }
	    fclose($archivo);
            shuffle($buenos);
            return $buenos;
        }

        function getImagenesMalas() {
            global $categoria;
            global $rutaImagenes;

            for ($i = 1; $i <= 6; $i++) {
                $malos[] = $rutaImagenes . $categoria . "Mal/$i.JPG";
            }
            shuffle($malos);
            return $malos;
        }
        
        
        ?>
    </body>
</html>
