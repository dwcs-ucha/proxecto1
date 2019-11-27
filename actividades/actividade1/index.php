<?php
  // BreoBeceiro:22/11/2019
  // PROXECTO 1ª AVALIACIÓN | Versión 1.0
?>
<html lang="gl">
    <head>
        <?php
            include('../../layout/head.php');
        ?>
        <style type="text/css">

            h3 { text-align: center;
                 margin-top: 5px; }
            form { width: 80%; margin: auto; }
            input[type=submit] { margin: auto; }
            .nota{ text-align: center; margin-top: 5px; }

        </style>
        <script type="text/javascript">

            // JS

        </script>
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
                    header('Location: '. $url .'');
                }
            ?>
        
            <h3>Benvid@ a 'Completar sílabas e palabras'!</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <span>Elixe a dificultade:</span><br />
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

                <div class="form-group">
                    <span>Elixe o tema gráfico:</span><br />
                    <input type="radio" name="tema" value="claro" id="Claro" checked />
                    <label for="Claro">Claro:</label>
                    <br />

                    <input type="radio" name="tema" value="escuro" id="Escuro" />
                    <label for="Escuro">Escuro:</label>
                    <br />
                </div>

                <input type="submit" name="xogar" id="Xogar" value="Xogar!" class="btn btn-primary" />
                <br />
                
            </form>

            <?php
                include('../../layout/pe.php');
            ?>
        </div>
    </body>
</html>