<?php
    // BreoBeceiro:22/11/2019
    // PROXECTO 1º AVALIACIÓN | Versión 1.0

    // FALTA IMPLEMENTAR AS PUNTUACIÓNS E LEVALAS AO CSV, NO CASO DE QUE O XOGADOR ASÍ O QUEIRA.
    // HAI QUE REFINAR A RECARGA DA PÁXINA SEN QUE SE REORDENE O CONTIDO DAS CAIXAS.
    // OPCIONALMENTE, FALTARÍA ENGADIR O CAMBIO DA COR DE FONDO DOS ELEMENTOS input NOS CALES ESTÁN
    //   AS SÍLABAS A ESCRIBIR. A IDEA É QUE INICIALMENTE APAREZAN NUNHA COR, E QUE AO ESCRIBILAS
    //   NAS CAIXAS DE ACERTAR, A COR DE FONDO CAMBIE.
    // O ESTADO DO ARRAY $silabasFinais TES QUE CONSERVALO CUN input hidden, empregando as funcións explode()
    //   e implode(), pois os campos hidden non aceptan matrices (hai que convertir o array nun string antes de 
    //   mandalo ao input, e logo recuperalo).

    // Arquivo que pode desaparecer:
    include('actividadeDoada_Utilidades.php');

    // Módulo de funcións de validación e saneamento:
    include('actividadeDoada_moduloFuncions.php');

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

        if(!validaSilaba(strtoupper($silabaLE), "LE")){
            $erroLE= "Tes que poñer LE...";
        }

        if(!validaSilaba(strtoupper($silabaLA), "LA")){
            $erroLA= "Tes que poñer LA...";
        }

        if(!validaSilaba(strtoupper($silabaLI), "LI")){
            $erroLI= "Tes que poñer LI...";
        }

        if(!validaSilaba(strtoupper($silabaLO), "LO")){
            $erroLO= "Tes que poñer LO...";
        }

        if(!validaSilaba(strtoupper($silabaLU), "LU")){
            $erroLU= "Tes que poñer LU...";
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
        </style>
        <title>
            Completar sílabas e palabras | Nivel 1
        </title>
    </head>

    <body>
        <div class="container">
            <?php
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
                        if(!isset($_POST['enviar'])){
                            $silabasFinais= array("PIZ", "CHE", "BRO", "RO", "NA");
                            shuffle($silabasFinais);
                        }elseif(isset($_POST['refrescar'])){
                            shuffle($silabasFinais);
                            if(isset($_POST['enviar'])){
                                $silabasFinais;
                            }
                        }

                        // A variable $i servirá para asegurar que en cada iteracción do bucle se constrúen os 'input' con atributos 
                        //   'name' e 'id' distintos:
                        $i= 1;

                        foreach($silabasFinais as $silabaFinal){
                            ?>
                                <div class="col">
                                    <?php
                                        devolveImaxe($silabaFinal);
                                    ?>
                                    <br />
                                    <div class="form-group">
                                        <input type='text' name='silaba<?php echo devolveSilabaInicial($silabaFinal); ?>' id='Silaba<?php echo devolveSilabaInicial($silabaFinal); ?>' value="<?php isset($_POST['silaba{print devolveSilabaInicial($silabaFinal)']) ? print $silaba{print devolveSilabaInicial($silabaFinal)} : print ""; ?>" maxlength='2' class="form-control" />
                                        <input type='text' name='silabaFinal<?php echo $i; ?>' id='SilabaFinal<?php echo $i; ?>' value='<?php echo $silabaFinal; ?>' class="form-control" readonly='readonly' />
                                    </div>
                                    <br />
                                    <?php
                                        switch($silabaFinal){
                                            case "PIZ":
                                                if(isset($_POST['enviar']) && isset($erroLA)){ echo $erroLA; }
                                                break;
                                            case "CHE":
                                                if(isset($_POST['enviar']) && isset($erroLE)){ echo $erroLE; }
                                                break;
                                            case "BRO":
                                                if(isset($_POST['enviar']) && isset($erroLI)){ echo $erroLI; }
                                                break;
                                            case "RO":
                                                if(isset($_POST['enviar']) && isset($erroLO)){ echo $erroLO; }
                                                break;
                                            case "NA":
                                                if(isset($_POST['enviar']) && isset($erroLU)){ echo $erroLU; }
                                                break;
                                        }
                                        $i++;
                                        echo "</div>";
                        }
                                    ?>
                </div>

                <br /><br />

                <input type="submit" name="enviar" id="Enviar" value="Comprobar" />
                <input type="submit" name="refrescar" id="Refrescar" value="Refrescar" />

                <?php
                    include('../../layout/pe.php');
                ?>
            </form>
        </div>
    </body>
</html>

<?php isset($_POST['silaba{print devolveSilabaInicial($silabaFinal)']) ? print $silaba{print devolveSilabaInicial($silabaFinal)} : print ""; ?>

<?php //if (isset($_POST["silaba" . devolveSilabaInicial($silabaFinal)])) { $_POST["silaba" . devolveSilabaInicial($silabaFinal)]; } else { echo ""; } ?>