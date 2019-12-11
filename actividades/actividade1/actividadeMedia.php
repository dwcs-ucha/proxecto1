<?php
    // BreoBeceiro:29/11/2019
    // PROXECTO 1º AVALIACIÓN | Versión 1.0

    // O XOGADOR FARÁ CLICK NAS IMAXES OU NA PALABRA QUE CONTEÑA A SÍLABA A BUSCAR. AO FACER CLICK,
    //   O BORDE DO ELEMENTO CAMBIARÁ O SEU ESTILO E SE GARDARÁ O SEU ATRIBUTO name OU id NUN ARRAY
    //   PARA PASALO LOGO A UN input OCULTO QUE PERMITIRÁ COMPARAR OS SEUS VALORES COS CORRECTOS NA
    //   SEGUINTE CARGA DA PÁXINA.

    // Módulo de funcións de validación e saneamento:
    include('moduloFuncions.inc.php');

    // Ficheiro de funcións comúns do sitio:
    include('../../librerias/utils.php');
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
        <script type="text/javascript" src="actividadeMedia.js"></script>
        <style type="text/css">

            .container { text-align: center; }
            .imaxe { height: 50%;  margin: auto;}
            input[type=text] { width: 100%; }
            
        </style>
        <title>
            Completar sílabas e palabras | Nivel 2
        </title>
    </head>

    <body>
        <wrapper class="d-flex flex-column">
            <main class="container corpo">
                <?php
                    // Inclúese a estrutura da cabeceira común do sitio:
                    include('../../layout/cabeceira.php');
                ?>

                <h2 onclick="alerta();">Completar Sílabas e Palabras<br />(Intermedio)</h2>

                <div class="row align-items">
                    <?php
                        $palabras= array("1"=>"PAPA", 
                                        "2"=>"PATO", 
                                        "3"=>"RATA", 
                                        "4"=>"BATA", 
                                        "5"=>"BOCADILLO", 
                                        "6"=>"BOSQUE", 
                                        "7"=>"PERRO", 
                                        "8"=>"LATA");

                        for($j=1; $j<=2; $j++){
                            for($i=1; $i<=4; $i++){
                                ?>
                                    <div class="col-md-3">
                                        <?php
                                            if($j==1){
                                        ?>
                                                <img src='Imaxes/ProxectoMedio_Imaxe<?php echo $i; ?>.jpg' class='imaxe' />
                                                <br />
                                                <input type='text' id='Palabra<?php echo $i; ?>' value='<?php echo $palabras["$i"]; ?>' readonly="readonly" />
                                        <?php
                                            }else{
                                        ?>
                                                <img src='Imaxes/ProxectoMedio_Imaxe<?php echo $i+4; ?>.jpg' class='imaxe' />
                                                <br />
                                                <input type='text' id='Palabra<?php echo $i+4; ?>' value='<?php echo $palabras["$i"+4]; ?>' readonly="readonly" />
                                                <?php
                                            }
                                        ?>
                                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
                
                <?php
                    // Inclúese a estrutura do pé común do sitio:
                    include('../../layout/pe.php');
                ?>
            </main>
        </wrapper>
    </body>
</html>