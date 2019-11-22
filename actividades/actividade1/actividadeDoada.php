<?php
    // BreoBeceiro:12/11/2019
    // PROXECTO 1º AVALIACIÓN | Versión 1.0

    // Arquivo que pode desaparecer:
    include('actividadeDoada_Utilidades.php');

    // Módulo de funcións de validación e saneamento:
    include('actividadeDoada_moduloFuncions.php');

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
        $silabasFinais= array("PIZ", "CHE", "BRO", "RO", "NA");
        //shuffle($silabasFinais);
    }
?>
<!doctype html>
<html lang="gl">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="actividadeDoada.css">
        <script type="text/javascript" src=""></script>
        <style type="text/css">
            .container { text-align: center; }
            /*form { text-align: center; }*/
            .col {text-align: center;}
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
                include('actividadeDoada_Header.html');
            ?>
            <h2>Completar Sílabas e Palabras<br />(Fácil)</h2>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="text" name="silabaLA" id="" value="LA" readonly="readonly" />
                <input type="text" name="silabaLE" id="" value="LE" readonly="readonly" />
                <input type="text" name="silabaLI" id="" value="LI" readonly="readonly" />
                <input type="text" name="silabaLO" id="" value="LO" readonly="readonly" />
                <input type="text" name="silabaLU" id="" value="LU" readonly="readonly" />

                <br /><br />

                <div class="row align-items">
                    <?php
                        // Ao array $silabasFinais hai que aplicarlle a función shuffle no corpo da páxina, pois facéndoo no
                        //   bloque previo á etiqueta <!doctype html> os seus elementos non cambiaban de posición.
                        shuffle($silabasFinais);

                        // A variable $i servirá para asegurar que en cada iteracción do bucle se constrúen os input con atributos 
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
                                        <input type='text' name='silaba<?php echo devolveSilabaInicial($silabaFinal); ?>' id='Silaba<?php echo devolveSilabaInicial($silabaFinal); ?>' value="<?php isset($_POST['enviar']) && isset($silaba{$i})? print $silaba{$i} : print ""; ?>" maxlength='2' class="form-control" />
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
            </form>
        </div>
    </body>
</html>