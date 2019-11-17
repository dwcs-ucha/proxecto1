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
        $silaba1= $_POST['silaba1'];
        $silaba2= $_POST['silaba2'];
        $silaba3= $_POST['silaba3'];
        $silaba4= $_POST['silaba4'];
        $silaba5= $_POST['silaba5'];

        if(!validaSilaba(strtoupper($silaba2), "LE")){
            $erro2= "Tes que poñer LE...";
        }

        if(!validaSilaba(strtoupper($silaba1), "LA")){
            $erro1= "Tes que poñer LA...";
        }

        if(!validaSilaba(strtoupper($silaba3), "LI")){
            $erro3= "Tes que poñer LI...";
        }

        if(!validaSilaba(strtoupper($silaba4), "LO")){
            $erro4= "Tes que poñer LO...";
        }

        if(!validaSilaba(strtoupper($silaba5), "LU")){
            $erro5= "Tes que poñer LU...";
        }

        // HAI QUE VALIDALOS CAMPOS ANTES DE PASALOS AO VECTOR E COMPROBAR QUE NON TEÑAN UNHA LONXITUDE SUPERIOR A 2 CARACTERES
        //   (OS inputs VAN LIMITADOS A 2 CARACTERES NO HTML, PERO ESTE PODE SER MODIFICADO DENDE O CLIENTE, POLO QUE HAI QUE
        //   VALIDALO IGUALMENTE NO SERVIDOR).

        $silabas= array("LA"=>$silaba1, "LE"=>$silaba2, "LI"=>$silaba3, "LO"=>$silaba4, "LO"=>$silaba5);
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
                        for($i=1;$i<=5;$i++){
                            ?>
                                <div class="col">
                                    <img src='Imaxes/ProxectoFacil_Imaxe<?php echo $i; ?>.jpg' class='imaxesNivel1' />
                                    <br />
                                    <div class="form-group">
                                        <input type='text' name='silaba<?php echo $i; ?>' id='Silaba<?php echo $i; ?>' value="<?php isset($_POST['enviar']) && isset($silaba{$i})? print $silaba{$i} : print ""; ?>" maxlength='2' class="form-control" />
                                        <input type='text' name='silabaFinal<?php echo $i; ?>' id='SilabaFinal<?php echo $i; ?>' value='<?php echo $silabasFinais[$i]; ?>' class="form-control" readonly='readonly' />
                                    </div>
                                    <br />
                                    <?php
                                        switch($i){
                                            case 1:
                                                if(isset($_POST['enviar']) && isset($erro1)){ echo $erro1; }
                                                break;
                                            case 2:
                                                if(isset($_POST['enviar']) && isset($erro2)){ echo $erro2; }
                                                break;
                                            case 3:
                                                if(isset($_POST['enviar']) && isset($erro3)){ echo $erro3; }
                                                break;
                                            case 4:
                                                if(isset($_POST['enviar']) && isset($erro4)){ echo $erro4; }
                                                break;
                                            case 5:
                                                if(isset($_POST['enviar']) && isset($erro5)){ echo $erro5; }
                                                break;
                                        }
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