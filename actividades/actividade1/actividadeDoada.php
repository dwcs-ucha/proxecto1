<?php
    // BreoBeceiro:29/11/2019
    // PROXECTO 1º AVALIACIÓN | Versión 1.0

    // FALTA IMPLEMENTAR AS PUNTUACIÓNS E LEVALAS AO CSV, NO CASO DE QUE O XOGADOR ASÍ O QUEIRA.
    // HAI QUE REFINAR A RECARGA DA PÁXINA SEN QUE SE REORDENE O CONTIDO DAS CAIXAS.
    // OPCIONALMENTE, FALTARÍA ENGADIR O CAMBIO DA COR DE FONDO DOS ELEMENTOS input NOS CALES ESTÁN
    //   AS SÍLABAS A ESCRIBIR. A IDEA É QUE INICIALMENTE APAREZAN NUNHA COR, E QUE AO ESCRIBILAS
    //   NAS CAIXAS DE ACERTAR, A COR DE FONDO CAMBIE.

    // Módulo de funcións de validación e saneamento:
    include('moduloFuncions.php');

    // Ficheiro de funcións comúns do sitio:
    include('../../librerias/utils.php');

    //var_dump(validaSilaba("LE", "LA")); // Mándaselle un LE, e ten que haber un LA -> Devolve FALSE
    //var_dump(sizeSilaba("L")); // Mándaselle un caracter e teñen que ser dous -> Devolve FALSE

    if(isset($_POST['enviar'])){
        $silabaLA= $_POST['silabaLA'];
        $silabaLE= $_POST['silabaLE'];
        $silabaLI= $_POST['silabaLI'];
        $silabaLO= $_POST['silabaLO'];
        $silabaLU= $_POST['silabaLU'];

        $puntos= 0;

        // Se os valores introducidos non superan cadanseu filtro, gárdase unha mensaxe de erro que se amosará
        //   embaixo de cada campo:
        if(!validaSilaba(strtoupper($silabaLE), "LE")){
            $erroLE= "A sílaba correcta era LE.";
        }else{
            $noraboaLE= "Moi ben!";
            $puntos++;
        }

        if(!validaSilaba(strtoupper($silabaLA), "LA")){
            $erroLA= "A sílaba correcta era LA.";
        }else{
            $noraboaLA= "Moi ben!";
            $puntos++;
        }

        if(!validaSilaba(strtoupper($silabaLI), "LI")){
            $erroLI= "A sílaba correcta era LI.";
        }else{
            $noraboaLI= "Moi ben!";
            $puntos++;
        }

        if(!validaSilaba(strtoupper($silabaLO), "LO")){
            $erroLO= "A sílaba correcta era LO.";
        }else{
            $noraboaLO= "Moi ben!";
            $puntos++;
        }

        if(!validaSilaba(strtoupper($silabaLU), "LU")){
            $erroLU= "A sílaba correcta era LU.";
        }else{
            $noraboaLU= "Moi ben!";
            $puntos++;
        }

        // Recupérase a cadea de texto do campo oculto (ese campo de texto era un array na carga anterior da páxina,
        //   e convertirase de novo nun na presente):
        if(isset($_POST['silabasFinais'])){
            $silabasFinais= explode(",", $_POST['silabasFinais']);
        }

        //$silabasIniciais= array("LA"=>$silaba1, "LE"=>$silaba2, "LI"=>$silaba3, "LO"=>$silaba4, "LU"=>$silaba5);
        //shuffle($silabasFinais);
    }
?>
<!doctype html>
<html lang="gl">
    <head>
        <?php
            // Inclúense sentenzas do <head> comúns a tódalas páxinas do sitio:
            $directorioRaiz ="../..";
            include('../../layout/head.php');

            // En función do valor do parámetro 'tema' que veña pola URL, se é que ven, empregarase unha capa de CSS
            //   ou outra (sendo as existentes dúas, unha de estilo claro, e outra de estilo escuro):
            if(empty($_GET['tema'])){
                echo "<link rel='stylesheet' type='text/css' href='estiloClaro.css'>";
            }elseif($_GET['tema']== "escuro"){
                echo "<link rel='stylesheet' type='text/css' href='estiloEscuro.css'>";
            }elseif($_GET['tema']== "claro"){
                echo "<link rel='stylesheet' type='text/css' href='estiloClaro.css'>";
            }
        ?>
        <script type="text/javascript" src=""></script>
        <style type="text/css">
            .container { text-align: center; }
            /*.opcions { background-color: #2D39EA; }
            /*form { text-align: center; }*/
            .col {text-align: center; }
            .imaxesNivel1 { height: 42%; }
            .col input[type=text] { width: 45%;
                                    font-size: 30px;
                                    margin: auto; }
            .formPuntos { width: 45%;
                          margin: auto; }
            form fieldset { border: 1px solid black; 
                            padding: 5px;
                            margin: 15px 1px; }
            .enviaPuntos { float: left; }
        </style>
        <title>
            Completar sílabas e palabras | Nivel 1
        </title>
    </head>

    <body>
        <div class="container">
            <?php
                // Inclúese a estrutura da cabeceira común do sitio:
                include('../../layout/cabeceira.php');
            ?>

            <h2>Completar Sílabas e Palabras<br />(Fácil)</h2>

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="text" name="silabaLA" class="opcions" value="LA" readonly="readonly" />
                <input type="text" name="silabaLE" class="opcions" value="LE" readonly="readonly" />
                <input type="text" name="silabaLI" class="opcions" value="LI" readonly="readonly" />
                <input type="text" name="silabaLO" class="opcions" value="LO" readonly="readonly" />
                <input type="text" name="silabaLU" class="opcions" value="LU" readonly="readonly" />

                <br /><br />

                <div class="row align-items">
                    <?php
                        // Ao array $silabasFinais hai que aplicarlle a función shuffle no corpo da páxina, pois facéndoo no
                        //   bloque previo á etiqueta <!doctype html> os seus elementos non cambiaban de posición.

                        // Na primeira carga da páxina, defínese o array $silabasFinais e revólvense os seus elementos (se non,
                        //   na primeira carga aparecerían sempre na mesma orde, e desta forma, é aleatoria):
                        if(!isset($_POST['enviar'])){
                            $silabasFinais= array("PIZ", "CHE", "BRO", "RO", "NA");
                            shuffle($silabasFinais);
                        }

                        // Cando se pulse en 'Refrescar', revólvense de novo os elementos:
                        if(isset($_POST['refrescar'])){
                            shuffle($silabasFinais);
                        }

                        // O array $silabasFinais convértese nunha cadea de texto que se gardará nun campo oculto do formulario 
                        //   para gardar o estado do array na seguinte carga da páxina, se esta se produce por premer en 'Comprobar'
                        //   xa que se se produce por premer en 'Refrescar', o estado do array cambiará, dado que pasará de novo
                        //   pola función shuffle():
                        $silabasFinaisSTRING= implode(",", $silabasFinais);

                        // A variable $i servirá para asegurar que en cada iteracción do bucle se constrúen os 'input' con atributos 
                        //   'name' ou 'id' distintos:
                        $i= 1;

                        // A estrutura seguinte percorre o array $silabasFinais e, en función do valor de cada un dos seus elementos,
                        //   o contido dos inputs e as imaxes a amosar serán distintos (é dicir, o contido de cada unha das caixas que
                        //   se producen con cada iteracción do bucle, varía en función do valor do elemento que hai en dita iteracción): 
                        foreach($silabasFinais as $silabaFinal){
                            ?>
                                <div class="col">
                                    <?php
                                        // A función devolveImaxe() vai devolver a imaxe correspondente coa sílaba de entrada:
                                        devolveImaxe($silabaFinal);
                                    ?>
                                    <br />
                                    <div class="form-group">
                                        <input type='text' name='silaba<?php echo devolveSilabaInicial($silabaFinal); ?>' id='Silaba<?php echo devolveSilabaInicial($silabaFinal); ?>' value="<?php if(isset($_POST["silaba" . devolveSilabaInicial($silabaFinal)])){ echo $_POST["silaba" . devolveSilabaInicial($silabaFinal)]; }else{ echo ""; } ?>" maxlength='2' class="form-control" />
                                        <input type='text' name='silabaFinal<?php echo $i; ?>' id='SilabaFinal<?php echo $i; ?>' value='<?php echo $silabaFinal; ?>' class="form-control" readonly='readonly' />
                                    </div>
                                    <br />
                                    <?php
                                        // O seguinte SWITCH evalúa o elemento do array e, en función do valor deste, devolve unha
                                        //   estrutura condicional coa que amosará a variable (se é que existe) que contén a mensaxe
                                        //   de erro do caso en particular:
                                        switch($silabaFinal){
                                            case "PIZ":
                                                if(isset($_POST['enviar']) && isset($erroLA)){ echo $erroLA; }
                                                if(isset($_POST['enviar']) && isset($noraboaLA)){ echo $noraboaLA; }
                                                break;
                                            case "CHE":
                                                if(isset($_POST['enviar']) && isset($erroLE)){ echo $erroLE; }
                                                if(isset($_POST['enviar']) && isset($noraboaLE)){ echo $noraboaLE; }
                                                break;
                                            case "BRO":
                                                if(isset($_POST['enviar']) && isset($erroLI)){ echo $erroLI; }
                                                if(isset($_POST['enviar']) && isset($noraboaLI)){ echo $noraboaLI; }
                                                break;
                                            case "RO":
                                                if(isset($_POST['enviar']) && isset($erroLO)){ echo $erroLO; }
                                                if(isset($_POST['enviar']) && isset($noraboaLO)){ echo $noraboaLO; }
                                                break;
                                            case "NA":
                                                if(isset($_POST['enviar']) && isset($erroLU)){ echo $erroLU; }
                                                if(isset($_POST['enviar']) && isset($noraboaLU)){ echo $noraboaLU; }
                                                break;
                                        }

                                        // Increméntase $i para a seguinte iteracción:
                                        $i++;

                                        // Péchase o div de clase 'col':
                                        echo "</div>";
                        }
                                    ?>
                </div>

                <br /><br />

                <input type="submit" name="enviar" id="Enviar" value="Comprobar" />
                <input type="submit" name="refrescar" id="Refrescar" value="Refrescar" />

                <?php // Defínese o campo oculto co que se transmitirá a cadea de texto cos valores do array $silabasFinais: ?>
                <input type="hidden" name="silabasFinais" value="<?php isset($silabasFinaisSTRING)? print $silabasFinaisSTRING : print ""; ?>" />
            </form>
            <?php
                if(isset($puntos)){
                    ?>
                        <div class="row">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="formPuntos">
                                <fieldset>
                                    <span>Gañaches <?php echo $puntos; ?> puntos, queres gardar esta puntuación?</span>
                                    <div class="col-md-12">
                                        <input type="radio" name="gardaPuntos" id="GardaPuntos" value="si" />
                                        <label for="GardaPuntos">Sí</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="radio" name="gardaPuntos" id="NonGardaPuntos" value="non" />
                                        <label for="NonGardaPuntos">Non</label>
                                    </div>
                                    <input type="submit" name="enviaPuntos" class="enviaPuntos" />
                                </fieldset>
                            </form>
                        </div>
                    <?php
                }
                    ?>
            <?php
                // Inclúese a estrutura do pé común do sitio:
                include('../../layout/pe.php');
            ?>
        </div>
    </body>
</html>

<!--BREO-->
<?php //isset($_POST['silaba{print devolveSilabaInicial($silabaFinal)']) ? print $silaba{print devolveSilabaInicial($silabaFinal)} : print ""; ?>

<!--MARCOS-->
<?php //if(isset($_POST["silaba" . devolveSilabaInicial($silabaFinal)])){ echo $_POST["silaba" . devolveSilabaInicial($silabaFinal)]; } else { echo ""; } ?>