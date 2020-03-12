{*
    BreoBeceiro:09/03/2020
    PROXECTO 2º AVALIACIÓN | Versión 1.0
*}

{include file="{$rutaRootPHP}{'Controlador/librerias/utils.php'}"}

<!doctype html>
<html lang="gl">
    <head>
        {include file="{$rutaRootPHP}Vista/layout/head.tpl"}
        <link rel='stylesheet' type='text/css' href='Estilos/estiloClaro.css'>
        <script type="text/javascript" src=""></script>
        <style type="text/css">

            .container { text-align: center; 
            }
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

            .row .col-md-12 { margin: 5px 1px; }

            .row input[type=text] { width: 65%; }

            .enviaPuntos { float: left;
                           margin: 1px 3px; }

        </style>
        <title>
            Completar sílabas e palabras | Nivel 1
        </title>
    </head>

    <body>
        <wrapper class="d-flex flex-column">
            {include file="{$rutaRootPHP}Vista/layout/cabeceira.tpl"}
            <main class="container corpo">
                <h2>Completar Sílabas e Palabras<br />(Fácil)</h2>

                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    {*
                        A estrutura de INPUTs a continuación permanece estática e habería que modificala para que amose as 
                          sílabas iniciais que haberá que rechear no caso de que as palabras a completar sean as da segunda
                          liña do CSV (pois as que aparecen tal e como está se corresponden coas da primeira liña).
                    *}
                    <input type="text" name="silabaLA" class="opcions" value="LA" readonly="readonly" />
                    <input type="text" name="silabaLE" class="opcions" value="LE" readonly="readonly" />
                    <input type="text" name="silabaLI" class="opcions" value="LI" readonly="readonly" />
                    <input type="text" name="silabaLO" class="opcions" value="LO" readonly="readonly" />
                    <input type="text" name="silabaLU" class="opcions" value="LU" readonly="readonly" />

                    <br /><br />

                    <div class="row align-items">

                        {* Imaxes e caixas de texto a cubrir polo xogador/a *}

                        {* Hai que percorrer o array $silabasFinais e, en función do valor de cada un dos seus elementos, o contido
                        //   dos inputs e as imaxes a amosar serán distintos (é dicir, o contido de cada unha das caixas que se
                        //   producen con cada iteracción do bucle, varía en función do valor do elemento que hai en dita iteracción).
                        // Haberá que empregar variables de SMARTY obtidas no controlador para empregalas na estrutura:
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
                                            case "TA":
                                                if(isset($_POST['enviar']) && isset($erroRA)){ echo $erroRA; }
                                                if(isset($_POST['enviar']) && isset($noraboaRA)){ echo $noraboaRA; }
                                                break;
                                            case "NO":
                                                if(isset($_POST['enviar']) && isset($erroRE)){ echo $erroRE; }
                                                if(isset($_POST['enviar']) && isset($noraboaRE)){ echo $noraboaRE; }
                                                break;
                                            case "O":
                                                if(isset($_POST['enviar']) && isset($erroRI)){ echo $erroRI; }
                                                if(isset($_POST['enviar']) && isset($noraboaRI)){ echo $noraboaRI; }
                                                break;
                                            case "CA":
                                                if(isset($_POST['enviar']) && isset($erroRO)){ echo $erroRO; }
                                                if(isset($_POST['enviar']) && isset($noraboaRO)){ echo $noraboaRO; }
                                                break;
                                            case "SIA":
                                                if(isset($_POST['enviar']) && isset($erroRU)){ echo $erroRU; }
                                                if(isset($_POST['enviar']) && isset($noraboaRU)){ echo $noraboaRU; }
                                                break;
                                        }

                                        // Increméntase $i para a seguinte iteracción:
                                        $i++;

                                        // Péchase o div de clase 'col':
                                        echo "</div>";
                        }*}

                    </div>

                    <input type="submit" name="enviar" id="Enviar" value="Comprobar" />
                    <input type="submit" name="refrescar" id="Refrescar" value="Refrescar" />

                    <input type="hidden" name="silabasFinais" value="<?php isset($silabasFinaisSTRING)? print $silabasFinaisSTRING : print ""; ?>" />
                </form>
            </main>
            {include file="{$rutaRootPHP}Vista/layout/pe.tpl"}
        </wrapper>
    </body>
</html>